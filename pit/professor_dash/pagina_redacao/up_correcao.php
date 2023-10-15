<?php

require("config.php");

$id_red = $_GET["id_red"];

$comentario = $_POST["comentario"];
$nota = $_POST["nota"];

$enviado = 1;

$sql = "INSERT INTO correcoes (id_redacao,comentario, nota, enviado) VALUES ('$id_red', '$comentario', '$nota', '$enviado');";

if (mysqli_query($conexao, $sql)) {
        echo "<script>
        alert('Correção postada.');
        window.location.href = 'redacao-prof.php';
        </script>";
    } else {
        echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);



?>