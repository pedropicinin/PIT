<?php

require("config.php");

$emailAntigo = $_POST['emailAntigo'];

   session_start();
    if (isset($_SESSION['usuario'])) {
        $id_professor = $_SESSION['usuario'];
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        $sql = "SELECT * FROM professor WHERE id_professor = $id_professor";
        $resultado = $conexao->query($sql);
      }


// Verifica se há um registro correspondente no banco de dados
if (mysqli_num_rows($resultado) == 1) {

  // Login bem-sucedido
 
 while($row = $resultado->fetch_assoc()) {
     $idUsuario = $row["id_professor"];
     $emailBD = $row["email"];

     if ($emailAntigo == $emailBD) 
     {
        $id_professor = $idUsuario;
        $emailNovo = $_POST['emailNovo'];

        $sql = "UPDATE professor SET email = '$emailNovo'
        WHERE id_professor = $id_professor";

         echo "<script> alert('Email alterado com sucesso!'); </script>";

         header('Location: USUARIO_PROFESSOR.php?id_professor='.$idUsuario);

     
         
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



// if (mysqli_query($conexao, $sql)) {
    echo "<script>
    alert('Alteração feita com sucesso.');
    
    </script>";
//} else {
    echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
//}

// Fechando a conexão com o banco de dados
//mysqli_close($conexao);

?>