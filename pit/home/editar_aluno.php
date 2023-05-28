<?php

require("config.php");

$email = $_POST['email'];

$sql = "SELECT * FROM aluno WHERE email = '$email'";   
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) == 1) {
   while($row = $resultado->fetch_assoc()) {
       $id_aluno = $row["id_aluno"];
   }}
 

$telefone = $_POST['number'];
$curso_desejado = $_POST['curso'];
$instituicao_desejada = $_POST['faculdade'];
$materias_dificuldade = $_POST['dificuldade'];
$materias_estudar = $_POST['MEstudar'];
$horas_estudadas = $_POST['horas'];
$notificacoes = $_POST['notificacao'];

$sql = "UPDATE aluno SET email = '$email', telefone = '$telefone', curso_desejado = '$curso_desejado', instituicao_desejada ='$instituicao_desejada', 
materias_estudar ='$materias_estudar', materias_dificuldade ='$materias_dificuldade', 
horas_estudadas='$horas_estudadas', notificacoes ='$notificacoes'
WHERE id_aluno = $id_aluno";


if (mysqli_query($conexao, $sql)) {
    echo "<script>
    alert('Alteração feita com sucesso.');
    
    </script>";
} else {
    echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);

?>