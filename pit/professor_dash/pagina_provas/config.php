
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "sem_desculpas";
$conexao = mysqli_connect($host,$user,$pass,$banco);

if (mysqli_connect_errno()) {
    die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
    exit();
}
else {
    return $conexao;

}
?>