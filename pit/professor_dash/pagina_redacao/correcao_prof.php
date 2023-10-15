<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Correção | Sem Desculpas</title>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.png" />
    <link rel="stylesheet" href="redacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

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

$id_red = $_GET["id"];

$sql = "SELECT * FROM view_redacao_aluno WHERE id = $id_red";
        
        $resultado = mysqli_query($conexao, $sql);
        
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $nome = $linha["nome"];
                $id = $linha["id"];
                $id_tema = $linha["id_red_textos"];

            }
} else {
    echo "Nenhum conteúdo encontrado para o ID ";
}


$sqltexto = "SELECT texto FROM redacoes WHERE id = $id_red";
        
        $resultado2 = mysqli_query($conexao, $sqltexto);
        
        if (mysqli_num_rows($resultado2) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado2)) {
            

                $redacao_do_aluno = $linha["texto"];
                $targetDir = 'http://localhost\\PIT\\pit\\uploadsRed_aluno';

                $targetFileVideo = $targetDir . "\\"  . $redacao_do_aluno;
            
                if (file_exists($targetFileVideo)) {
                    // Read the file contents
                    $file = file_get_contents($targetFileVideo);
            
                    // Define the path of the video file
                    $videoPath = "$redacao_do_aluno";
            
                    // Display the video
                } else {
                    echo "";
                }

            }
} else {
    echo "Nenhum conteúdo encontrado para o ID ";
}

mysqli_close($conexao);
        

?>

    <nav class="menu-lateral">

        <div class="btn_expandir">
            <i class="bi bi-list"></i>
        </div>

        <ul>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-house-door"></i></i></i></span>
                    <span class="txt-link">Home</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-columns-gap"></i></i></span>
                    <span class="txt-link">Dashboard</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-card-text"></i></span>
                    <span class="txt-link">Conteúdos</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                    <span class="txt-link">Provas</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-chat-dots"></i></span>
                    <span class="txt-link">Chat</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-graph-up"></i></span>
                    <span class="txt-link">Desempenho</span>
                </a>
            </li>
            <li class="item_menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Configurações</span>
                </a>
            </li>
        </ul>

    </nav>

    <div class="menu-principal">
        <div class="header">
            <div class="lupa-buscar">
                <i class="bi bi-search"></i>
            </div>
            <div class="input-buscar">
                <input type="text" name="" id="" placeholder="Faça uma busca">
            </div>
            <div class="btn-fechar">
                <i class="bi bi-x-circle"></i>
            </div>
        </div>

        <div class="home">
            <div class="usuario" id="user-tema">
                <a id="voltar" href="redacao-prof.php"> ← voltar </a> 
                <h1> Aluno: </h1> 
                <h3><?php echo $nome; ?> </h3> 
             
            </div>

        <div class="redacao-aluno">
            <?php 
            require("config.php");
            $extension = pathinfo($redacao_do_aluno, PATHINFO_EXTENSION);

            // If it does, display it in an iframe.
            if ($extension) {
                echo "<img src='$targetFileVideo' width='100%' height='100%'></img>";
            } else {
                // Otherwise, display the text as usual.
                echo "<textarea class='redacao' placeholder='$redacao_do_aluno' rows='40' cols='80' name='digitado' disabled></textarea>";
            }
            
            ?>
            
            
            

        </div>
        <?php
require("config.php");


// Verificar se a correção já foi enviada
$sql_verifica_correcao = "SELECT enviado FROM correcoes WHERE id_redacao = $id_red";
$resultado_verifica_correcao = mysqli_query($conexao, $sql_verifica_correcao);

if (!$resultado_verifica_correcao) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado_verifica_correcao) > 0) {
    $correcao_enviada = mysqli_fetch_assoc($resultado_verifica_correcao)["enviado"];
} else {
    $correcao_enviada = 0; // A correção ainda não foi enviada
}

if ($correcao_enviada) {
    echo "<h1>CORRIGIDA</h1>";
} else {
    // Mostrar o formulário de correção
    echo "<form action='up_correcao.php?id_red=$id_red' method='post'>";
    echo "<div class='avaliacao'>";
    echo "<label for='nota'>Nota:</label>";
    echo "<input id='nota' type='text' name='nota'>";
    echo "<label for='comentario'>Comentário:</label>";
    echo "<input id='comentario' type='text' name='comentario'>";
    echo "<button type='submit'>Postar correção</button>";
    echo "</div>";
    echo "</form>";
}

mysqli_close($conexao);

?>

        
            
        </div>
        
        
            
    </div>
</body>
</html>