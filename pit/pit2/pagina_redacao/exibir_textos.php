<?php

require("config.php");

$id = $_GET["id"];

$sql = "SELECT * FROM red_textos WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $tema = $linha["tema"];
    $texto = $linha["pdf_textos"];

    $targetDir = 'c:\wamp64\www\PIT\pit\uploadsRed_Textos';

    $targetFileProva = $targetDir . "/"  . $texto;

    if (file_exists($targetFileProva)) {
        // Read the file contents
        $file = file_get_contents($targetFileProva);

        // Display the PDF file
        header('Content-type: application/pdf');
        echo $file;
    } else {
        echo "Arquivo não encontrado.";
    }

} else {
    echo "Nenhum conteúdo encontrado para o ID " . $id;
}
mysqli_close($conexao);
?>