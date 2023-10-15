<?php
require("config.php");

session_start();
if (isset($_SESSION['usuario'])) {
    $id_aluno = $_SESSION['usuario'];
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}
} else {
    echo "Você não está logado.";
}

// Pega o id do tema da redação
$id = $_GET["id"];

// Pega o id do aluno
$id_aluno = $_SESSION['usuario'];


// Verifica se o aluno selecionou enviar uma foto
if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
    // Pega a foto da redação
    $foto = $_FILES["foto"];
    $enviado = 1;


    // Verifica o tipo de arquivo (permitindo JPEG e PNG)
    $allowed_types = array("image/jpeg", "image/jpg", "image/png");
    if (in_array($foto["type"], $allowed_types)) {
        $targetDir = "C:/wamp64/www/PIT/pit/uploadsRed_aluno";
        $targetFileFotoRed = $targetDir . "/" . basename($foto["name"]);

        if (move_uploaded_file($foto["tmp_name"], $targetFileFotoRed)) {
            // O arquivo foi movido com sucesso, agora você pode inserir o nome do arquivo no banco de dados
            $nomeArquivo = basename($foto["name"]);
            $sql = "INSERT INTO redacoes (id_aluno, id_red_textos, texto, enviado) VALUES ('$id_aluno', '$id', '$nomeArquivo', '$enviado')";

            if (mysqli_query($conexao, $sql)) {
                echo "<script>
                    alert('Redação enviada.');
                    window.location.href = 'redacao-aluno.php';
                </script>";
            } else {
                echo "Erro ao inserir dados na tabela: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro ao mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "Tipo de arquivo não suportado. Apenas arquivos JPEG e PNG são permitidos.";
    }


} else {
    // Pega o texto da redação
    $texto = $_POST["digitado"];
    $enviado = 1;


    // Insere os dados da redação no banco de dados
    $sql = "INSERT INTO redacoes (id_aluno, id_red_textos, texto, enviado) VALUES ('$id_aluno', '$id', '$texto', '$enviado')";
    $inserir = mysqli_query($conexao, $sql);

    if ($inserir) {
        echo "<script>
        alert('Redação enviada.');
       window.location.href = 'redacao-aluno.php';
        </script>";
    } else {
        echo "Erro ao enviar redação." . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>