<?php

require("config.php");


$nomeVideo = $_POST["nome_video"];
$descricao = $_POST["descricao"];
$materia = $_POST["MEstudar"];
$nomeArquivo = $_FILES["video"]["name"];

$targetDir = "C:/wamp64/www/PIT/pit/uploadsVideo";
$targetFile = $targetDir . "/" . basename($_FILES["video"]["name"]);

if (file_exists($targetDir)) {
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO videos (nome_video, descricao, materia, nome_arquivo) 
        VALUES ('$nomeVideo', '$descricao', '$materia', '$nomeArquivo')";


        if (mysqli_query($conexao, $sql)) {
            echo "<script>
            alert('Video postado.');
            window.location.href = 'VIDEO.html';
            </script>";
        } else {
            echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao fazer upload do vídeo." . mysqli_error($conexao);
    }
} else {
    echo "Erro: o diretório 'pit/uploadsVideo' não existe.";
}
mysqli_close($conexao);

?>
