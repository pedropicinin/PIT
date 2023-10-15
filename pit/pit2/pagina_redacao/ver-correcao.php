<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Correção | Sem Desculpas</title>
    <link rel="icon" type="image/svg+xml" href="assets/favicon.png" />
    <link rel="stylesheet" href="correcao.css">
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

if (isset($_GET['id'])) {
    $id_red_texto = $_GET['id'];

    // Consultar o banco de dados para obter informações da redação e correção
    $sql = "SELECT r.texto AS redacao_texto, c.comentario, c.nota 
    FROM redacoes AS r LEFT JOIN correcoes AS c ON r.id = c.id_redacao 
    WHERE r.id_aluno = $id_aluno AND r.id_red_textos = $id_red_texto";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $nota = $linha['nota'];
            $comentario = $linha['comentario'];
            $redacao_do_aluno = $linha['redacao_texto'];


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
}
?>

    <nav class="menu-lateral">

        <div class="btn_expandir">
            <i class="bi bi-list"></i>
        </div>

        <ul>
            <li class="item_menu">
            <a href="../pagina_usuario/INICIAL.php">
                    <span class="icon"><i class="bi bi-columns-gap"></i></i></span>
                    <span class="txt-link">Dashboard</span>
                </a>
            </li>
            <li class="item_menu">
            <a href="../pagina_conteudo/CONTEUDO_PRINCIPAL.html">
                    <span class="icon"><i class="bi bi-card-text"></i></span>
                    <span class="txt-link">Conteúdos</span>
                </a>
            </li>
            <li class="item_menu">
            <a href="../pagina_provas/PROVA_P.html">
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
            <a href="../pagina_usuario/CONFIGURACOES.html">
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
                <a id="voltar" href="redacao-aluno.php"> ← voltar </a> 
                <h1> Correção: </h1> 
                <h3> </h3> 
             
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


        <form >
            <div class="avaliacao">
        
                <label for=""> Nota: </label>
                <input id="nota" type="text" name="nota" value="<?php echo $nota ?>" disabled> 
                <label for=""> Comentario: </label>

                <input id="comentario" type="text" name="comentario" value="<?php echo $comentario ?>" disabled>

            </div>

        </form>

        
            
        </div>
        
        
            
    </div>
</body>
</html>