<?php

require("config.php");

$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['number'];
$cpf = $_POST['cpf'];
$senha = $_POST['password'];
$materia_lecionar = $_POST['materia_lecionar'];


$sql = "INSERT INTO professor (nome, email, senha, cpf, telefone, materia_lecionar)
        VALUES ('$nome', '$email', $senha, $cpf, '$telefone', '$materia_lecionar')";



if (mysqli_query($conexao, $sql)) {
    echo "<script>
    alert('Professor cadastrado com sucesso.');
    window.location.href = './LOGIN.html';
    </script>";
} else {
    echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);