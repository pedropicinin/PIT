<?php
require("config.php");
session_start();

if (isset($_SESSION['usuario'])) {
    $id_professor = $_SESSION['usuario'];

    $emailAntigo = $_POST['emailAntigo'];
    $emailNovo = $_POST['emailNovo'];

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Verifique se o email antigo corresponde ao email no banco de dados
    $sql = "SELECT * FROM professor WHERE id_professor = $id_professor";
    $resultado = $conexao->query($sql);

    if (mysqli_num_rows($resultado) == 1) {
        // O email antigo corresponde ao email no banco de dados
        $sql = "UPDATE professor SET email = '$emailNovo' WHERE id_professor = $id_professor";

        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Email alterado com sucesso!');</script>";
            header('Location: USUARIO_PROFESSOR.php?id_professor=' . $id_professor);
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
