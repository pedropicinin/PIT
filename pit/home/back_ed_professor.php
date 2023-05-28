<?php

require("config.php");

$email = $_POST['email'];

$sql = "SELECT * FROM professor WHERE email = '$email'";   
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) == 1) {
   while($row = $resultado->fetch_assoc()) {
       $id_professor = $row["id_professor"];
   }}
 

$telefone = $_POST['number'];
$materia_lecionar = $_POST['materia_lecionar'];


$sql = "UPDATE professor SET email = '$email', telefone = '$telefone', materia_lecionar ='$materia_lecionar'
WHERE id_professor = $id_professor";


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