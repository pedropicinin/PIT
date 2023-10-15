<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redações | Sem Desculpas</title>
    <link rel="icon" type="image/svg+xml" href="/pit/assets/favicon.png" />
    <link rel="stylesheet" href="redacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <?php
    require("config.php");
    
    session_start();
    if (isset($_SESSION['usuario'])) {
        $id_professor = $_SESSION['usuario'];
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
   }
    } else {
        echo "Você não está logado.";
    }
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
                <a href="../pagina_redacao/redacao-prof.html"> ← voltar </a> 

                <form action="upload_redacao.php"  method="post" enctype="multipart/form-data">

                    <h1> tema: </h1> 
                    <p class="desc-tema"> <input type="text" name="tema" id="" value="" required> </p> 
                    <p class="desc-tema">Categoria: ENEM</p></span>
                   
                
                <div class="botoes-acao2">
                    <button class="acao2" id="no-border"> <input type="file" name="textos" id="video" required></button>
                    <button class="acao2" type="submit" > Postar Redação</button>
                </div>
               
                <div class="principal-prof">
                        <div class="escrever">
                            <textarea readonly class="redacao" placeholder="Faça o upload dos textos motivadores no modelo ENEM" rows="50" cols="120" t disabled></textarea>
                </div>
                </form>
                
        </div>

            
            
        </div>
        
            
    </div>
</body>
</html>