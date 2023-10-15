<?php
require("config.php");
session_start();

if (isset($_SESSION['usuario'])) {
    $id_aluno = $_SESSION['usuario'];

    $emailAntigo = $_POST['emailAntigo'];
    $emailNovo = $_POST['emailNovo'];

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Verifique se o email antigo corresponde ao email no banco de dados
    $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
    $resultado = $conexao->query($sql);

    if (mysqli_num_rows($resultado) == 1) {
        // O email antigo corresponde ao email no banco de dados
        $sql = "UPDATE aluno SET email = '$emailNovo' WHERE id_aluno = $id_aluno";

        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Email alterado com sucesso!');</script>";
            header('Location: USUARIO_ALUNO.php?id_aluno=' . $id_aluno);
        } else {
            echo "Erro ao atualizar o email: " . mysqli_error($conexao);
        }
    } else {
        echo "<script>alert('Email antigo inválido.');</script>";
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo "Sessão não iniciada. Verifique a autenticação do usuário.";
}
?>
