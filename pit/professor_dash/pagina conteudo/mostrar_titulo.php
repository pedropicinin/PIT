<?php

require("config.php");

$disciplina = $_POST["disciplina"];
$disciplina = intval($disciplina);

// Executa a consulta SQL
$sql = "SELECT titulo FROM conteudos WHERE disciplina = $disciplina";
$resultado = $conexao->query($sql);


if ($resultado) {
    // A consulta retornou uma linha ou mais
    if ($resultado->num_rows > 0) {
        // Itera sobre os resultados da consulta SQL
        $i = 0;
        while ($row = $resultado->fetch_assoc()) {
            // Exibe o título do conteúdo
            echo "<h5 class=\"" . $i . "-cont\">" . $row["titulo"] . "</h5>";
            $i++;
        }
    } else {
        // Nenhum conteúdo encontrado
        echo "Nenhum conteúdo encontrado com a disciplina informada.";
    }
} else {
    // A consulta não retornou nenhuma linha
    echo "Erro na consulta SQL.";
}

$conexao->close();



?>