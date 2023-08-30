<?php

require("config.php");

$conteudoSegunda = $_POST["conteudoSegunda"];
$conteudoTerca = $_POST["conteudoTerca"];
$conteudoQuarta = $_POST["conteudoQuarta"];
$conteudoQuinta = $_POST["conteudoQuinta"];
$conteudoSexta = $_POST["conteudoSexta"];

$sqlSegunda = "INSERT INTO cronograma_estudos (conteudo, dia_semana) VALUES ('$conteudoSegunda', 'Segunda')";
$sqlTerca = "INSERT INTO cronograma_estudos (conteudo, dia_semana) VALUES ('$conteudoTerca', 'Terca')";
$sqlQuarta = "INSERT INTO cronograma_estudos (conteudo, dia_semana) VALUES ('$conteudoQuarta', 'Quarta')";
$sqlQuinta = "INSERT INTO cronograma_estudos (conteudo, dia_semana) VALUES ('$conteudoQuinta', 'Quinta')";
$sqlSexta = "INSERT INTO cronograma_estudos (conteudo, dia_semana) VALUES ('$conteudoSexta', 'Sexta')";



if (mysqli_query($conexao, $sqlSegunda) &&
        mysqli_query($conexao, $sqlTerca) &&
        mysqli_query($conexao, $sqlQuarta) &&
        mysqli_query($conexao, $sqlQuinta) &&
        mysqli_query($conexao, $sqlSexta)) {
        echo "<script>
        alert('Cronograma postado.');
        window.location.href = '../pagina_cronograma/CRONOGRAMA.html';
        </script>";
    } else {
        echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);
?>