<?php

require("config.php");

$tema = $_POST["tema"];
$textos = $_FILES["textos"]["name"];

$targetDir = "C:/wamp64/www/PIT/pit/uploadsRed_Textos";

$fileTypeRed = strtolower(pathinfo($textos, PATHINFO_EXTENSION));

if ($fileTypeRed != "pdf") {
    echo "Erro: O arquivo deve ser um PDF.";
    exit;
}


$targetFileTextos = $targetDir . "/" . basename($_FILES["textos"]["name"]);


if (move_uploaded_file($_FILES["textos"]["tmp_name"], $targetFileTextos)) {

    $sql = "INSERT INTO red_textos (tema, pdf_textos)
    VALUES ('$tema', '$textos')";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>
            alert('Proposta de redação postada.');
            window.location.href = 'redacao-prof.html';
            </script>";
    } else {
        echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao fazer upload dos arquivos." . mysqli_error($conexao);
}
mysqli_close($conexao);
?>

