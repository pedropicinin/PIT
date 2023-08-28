<?php

require("config.php");

$telAntigo = $_POST['telAntigo'];



   session_start();
    if (isset($_SESSION['usuario'])) {
        $id_aluno = $_SESSION['usuario'];
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
        $resultado = $conexao->query($sql);
      }


// Verifica se há um registro correspondente no banco de dados
if (mysqli_num_rows($resultado) == 1) {

  // Login bem-sucedido
 
 while($row = $resultado->fetch_assoc()) {
     $idUsuario = $row["id_aluno"];
     $telBD = $row["telefone"];

     if ($telAntigo == $telBD) 
     {
        $id_aluno = $idUsuario;
        $telNovo = $_POST['telNovo'];

        $sql = "UPDATE aluno SET telefone = '$telNovo'
        WHERE id_aluno = $id_aluno";

         echo "<script> alert('Telefone alterado com sucesso!');    </script>";

         header('Location: ../pit2/USUARIO_ALUNO.php?id_aluno='.$idUsuario);

     
         
     }
     else {
         echo "<script> alert('Email invalido.');    </script>";
     }
     
   }

} else {
  // Login inválido
  echo "<script> alert('senha incorreta.');    </script>";
}
// Fechando a conexão com o banco de dados
mysqli_close($conexao);



if (mysqli_query($conexao, $sql)) {
    echo "<script>
    alert('Alteração feita com sucesso.');
    
    </script>";
} else {
    echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);

?>