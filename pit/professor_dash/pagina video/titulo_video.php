<?php

require("config.php");

$disciplina = $_POST["disciplina"];

$sql = "SELECT * FROM videos WHERE materia = '$disciplina'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='conteudos-grid'>";
    while ($video = mysqli_fetch_assoc($resultado)) {
        echo "<div class='um-cont'>";
        echo "<h5>" . $video["nome_video"] . "</h5>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Nenhum vídeo encontrado.";
}

mysqli_close($conexao);

?>