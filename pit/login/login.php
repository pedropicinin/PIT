<?php

require("config.php");

$email = $_POST['usuario'];
$senha = $_POST['senha'];
$escolha = $_POST['escolha'];


if ($escolha == "Aluno")
{
     // Consulta SQL para verificar as informações de login
     

     $sql = "SELECT * FROM aluno WHERE email = '$email'";   
       $resultado = mysqli_query($conexao, $sql);

 
     // Verifica se há um registro correspondente no banco de dados
     if (mysqli_num_rows($resultado) == 1) {

         // Login bem-sucedido
        
        while($row = $resultado->fetch_assoc()) {
            $idUsuario = $row["id_aluno"];
            $senhaBD = $row["senha"];
            if (password_verify($senha, $senhaBD))
            {
                session_start();
                $_SESSION['usuario'] = $idUsuario;
        
                echo "<script> alert('Login realizado com sucesso!');    </script>";
                header('Location: ../pit2/pagina_usuario/INICIAL.html?id_aluno='.$idUsuario);
            }
            else {
                echo "<script> alert('Email ou senha incorretos.');    </script>";
            }
            
          }
    
     } else {
         // Login inválido
         echo "<script> alert('Email ou senha incorretos.');    </script>";
     }
     // Fechando a conexão com o banco de dados
     mysqli_close($conexao);
    
}

if ($escolha == "Professor")
{
    // Consulta SQL para verificar as informações de login
   
    $sql = "SELECT * FROM professor WHERE email = '$email'";    
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se há um registro correspondente no banco de dados
    if (mysqli_num_rows($resultado) == 1) {
        // Login bem-sucedido
        while($row = $resultado->fetch_assoc()) {
            $idUsuario = $row["id_professor"];
            $senhaBD = $row["senha"];
            if (password_verify($senha, $senhaBD))
            {
                session_start();
                $_SESSION['usuario'] = $idUsuario;
        
                echo "<script> alert('Login realizado com sucesso!');    </script>";
                header('Location: ../professor_dash/pagina usuario/INICIAL_PROFESSOR.html?id_professor='.$idUsuario);
            }
            else {
                echo "<script> alert('Email ou senha incorretos.');    </script>";
            }
            
          }
    
     } else {
         // Login inválido
         echo "<script> alert('Email ou senha incorretos.');    </script>";
     }
     // Fechando a conexão com o banco de dados
     mysqli_close($conexao);
    }

?>