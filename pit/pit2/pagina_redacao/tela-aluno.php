<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redações | Sem Desculpas</title>
    <link rel="icon" type="image/svg+xml" href="../assets/favicon.png" />
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


} else {
    echo "Nenhum conteúdo encontrado para o ID " . $id;
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
                <a href="../pagina_redacao/tema-aluno.php?id=<?php echo $id; ?>"> ← voltar </a> 
                <h1>tema: </h1> 
                <p class="desc-tema">Categoria: ENEM</p></span>
                <p class="desc-tema"> <?php echo $tema; ?>  </p> 


                <?php 
                require("config.php");

                $sql_verifica_envio = "SELECT enviado FROM redacoes WHERE id_aluno = $id_aluno AND id_red_textos = $id";
                $resultado_verifica_envio = mysqli_query($conexao, $sql_verifica_envio);
                
                if (mysqli_num_rows($resultado_verifica_envio) > 0) {
                    $redacao_enviada = mysqli_fetch_assoc($resultado_verifica_envio)["enviado"];
                } else {
                    $redacao_enviada = 0; // A redação ainda não foi enviada
                }
                
                ?>
                <form action="up_red_aluno.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            
            <div class="botoes-acao2">
                <button class="acao2" disabled> Digitar </button>
                <button class="acao2" id="no-border" disabled>  <input type="file" name="foto" accept="image/jpeg, image/jpg" /> <br> <i class="bi bi-camera"></i> Enviar foto  </button>
            </div>
           
            <div class="principal">
                    <div class="escrever">
                        <textarea class="redacao" placeholder="Escreva aqui" rows="50" cols="120" name="digitado"></textarea>
                        <div class="caracteres">
                            <p> *Mínimo 200 caracteres</p>
                            <p id="contagem"> 0/2600 </p>
                        </div>
                        <div class="escanteio">
                            <button> <i class="bi bi-file-arrow-down"></i>  <a href="folha_redacao.pdf" download="folha">
Baixar folha em branco para Redação Manuscrita </a></button>
                        <p class="atencao"> <i class="bi bi-exclamation-triangle-fill"></i>
                                <span>Atenção</span> <br>
                                Sua redação passará por um detector de plágio. 
                                Cópias completas (ou trechos) da internet ou de outras redações serão identificadas. 
                                Evite constrangimento e faça sua própria redação: você só tem a ganhar!</p>
                        
                                <?php
                if ($redacao_enviada) {
                    echo "<button class='correcao' disabled>ENVIADA, aguardando correção</button>";
                } else {
                    echo "<button class='correcao' type='submit'>Enviar para a correção</button>";
                }

                mysqli_close($conexao);

                ?>
                        
                </div>
            </div>
            </form>
        </div>

            
            
        </div>
        
            
    </div>
</body>
</html>