<?php

require("config.php");

$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['number'];
$cpf = $_POST['cpf'];
$curso_desejado = $_POST['curso'];
$instituicao_desejada = $_POST['faculdade'];
$senha = $_POST['password'];
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
$materias_dificuldade = $_POST['dificuldade'];
$materias_estudar = $_POST['MEstudar'];
$horas_estudadas = $_POST['horas'];
$notificacoes = $_POST['notificacao'];

$sql = "INSERT INTO aluno (nome, cpf, telefone, email, senha, curso_desejado, instituicao_desejada, materias_estudar, materias_dificuldade, horas_estudadas, notificacoes)
VALUES ('$nome', '$cpf', '$telefone', '$email', '$senhaCriptografada', '$curso_desejado', '$instituicao_desejada', '$materias_estudar', '$materias_dificuldade', $horas_estudadas, $notificacoes)";

if (mysqli_query($conexao, $sql)) {
    echo "<script>
    alert('Aluno cadastrado com sucesso.');
    window.location.href = '../login/LOGIN.html';
    </script>";
} else {
    echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);
?>