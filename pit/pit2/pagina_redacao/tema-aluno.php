<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Redações | Sem Desculpas</title>
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
      echo     $id_aluno = $_SESSION['usuario'];
  

$id = $_GET["id"];

$sql = "SELECT * FROM red_textos WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $tema = $linha["tema"];
    $texto_m = $linha["pdf_textos"];

    $targetDir = 'c:\wamp64\www\PIT\pit\uploadsRed_Textos';

    $targetFileTema = $targetDir . "/" . $texto_m;

    if (file_exists($targetFileTema)) {
        // Download the file
        if (isset($_POST["download"])) {
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=$texto_m");
            readfile($targetFileTema);
        }
    } else {
        echo "Arquivo não encontrado.";
    }

} else {
    echo "Nenhum conteúdo encontrado para o ID " . $id;
}
mysqli_close($conexao);
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
                <h1>tema: </h1> 
                <h3><?php echo $tema; ?> </h3> 
                <div class="botoes-acao">

                    <a href="./tela-aluno.php?id=<?php echo $id; ?>" class="solid-button"> Iniciar Redação</a>
                </div>
            </div>

            <div class="tema">
            <iframe src="exibir_textos.php?id=<?php echo $id; ?>" width="100%" height="500px"></iframe>

            </div>
            
        </div>
        
        
            
    </div>
</body>
</html>