<?php

require("config.php");

$titulo = $_POST["titulo"];
$materia = $_POST["materia"];
$disciplina = $_POST["disciplina"];
$anexo = $_FILES["anexo"]["name"]; // Nome do arquivo



// Upload do anexo (caso desejado)
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["anexo"]["name"]);
move_uploaded_file($_FILES["anexo"]["tmp_name"], $target_file);

// Inserir dados na tabela
$sql = "INSERT INTO conteudos (titulo, materia, disciplina, anexo)
            VALUES ('$titulo', '$materia', '$disciplina', '$anexo')";


    if (mysqli_query($conexao, $sql)) {
        echo "<script>
        alert('Conteúdo postado.');
        window.location.href = '../CONTEUDO.html';
        </script>";
    } else {
        echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
?>