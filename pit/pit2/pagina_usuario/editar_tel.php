<?php
require("config.php");
session_start();

if (isset($_SESSION['usuario'])) {
    $id_aluno = $_SESSION['usuario'];

    $telAntigo = $_POST['telAntigo'];
    $telNovo = $_POST['telNovo'];

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Verifique se o telefone antigo corresponde ao telefone no banco de dados
    $sql = "SELECT telefone FROM aluno WHERE id_aluno = $id_aluno";
    $resultado = $conexao->query($sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = $resultado->fetch_assoc();
        $telBD = $row["telefone"];

        // Remova espaços em branco e caracteres especiais do número de telefone
        $telAntigo = preg_replace('/\D/', '', $telAntigo);
        $telBD = preg_replace('/\D/', '', $telBD);

        if ($telAntigo == $telBD) {
            // O número de telefone antigo corresponde ao número de telefone no banco de dados
            $id_aluno = $_SESSION['usuario'];
            $sql = "UPDATE aluno SET telefone = '$telNovo' WHERE id_aluno = $id_aluno";

            if (mysqli_query($conexao, $sql)) {
                echo "<script>alert('Telefone alterado com sucesso!');</script>";
                header('Location: USUARIO_ALUNO.php?id_aluno=' . $id_aluno);
            } else {
                echo "Erro ao atualizar o telefone: " . mysqli_error($conexao);
            }
        } else {
            echo "<script>alert('Telefone antigo inválido.');</script>";
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
