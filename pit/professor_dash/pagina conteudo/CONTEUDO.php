<?php

require("config.php");


$titulo = $_POST["titulo"];
$materia = $_POST["materia"];
$disciplina = $_POST["disciplina"];
$anexo = $_FILES["anexo"]["name"];

$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["anexo"]["name"]);

if (move_uploaded_file($_FILES["anexo"]["tmp_name"], $targetFile)) {
    $sql = "INSERT INTO conteudos (titulo, materia, disciplina, anexo)
            VALUES ('$titulo', '$materia', '$disciplina', '$anexo')";


    if (mysqli_query($conexao, $sql)) {
        echo "<script>
        alert('Conteudo postado.');
        window.location.href = 'CONTEUDO.html';
        </script>";
    } else {
        echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao fazer upload do vídeo." . mysqli_error($conexao);
}
mysqli_close($conexao);

?>