<?php
require("config.php");
session_start();

if (isset($_SESSION['usuario'])) {
    $id_aluno = $_SESSION['usuario'];

    $senhaAntiga = $_POST['senhaAntiga'];
    $senhaNova = $_POST['senhaNova'];
    $confirmeSenha = $_POST['confirmeSenha'];

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Verifique se a senha antiga corresponde à senha no banco de dados
    $sql = "SELECT senha FROM aluno WHERE id_aluno = $id_aluno";
    $resultado = $conexao->query($sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = $resultado->fetch_assoc();
        $senhaBD = $row["senha"];

        if (password_verify($senhaAntiga, $senhaBD)) {
            if ($senhaNova === $confirmeSenha) {
                // A senha antiga corresponde e a nova senha e a confirmação coincidem
                $senhaCriptografada = password_hash($senhaNova, PASSWORD_DEFAULT);
                $sql = "UPDATE aluno SET senha = '$senhaCriptografada' WHERE id_aluno = $id_aluno";

                if (mysqli_query($conexao, $sql)) {
                    echo "<script>alert('Senha alterada com sucesso!');</script>";
                    header('Location: USUARIO_ALUNO.php?id_aluno=' . $id_aluno);
                } else {
                    echo "Erro ao atualizar a senha: " . mysqli_error($conexao);
                }
            } else {
                echo "<script>alert('A nova senha e a confirmação não coincidem.');</script>";
            }
        } else {
            echo "<script>alert('Senha antiga inválida.');</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado.');</script>";
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo "Sessão não iniciada. Verifique a autenticação do usuário.";
}
?>
