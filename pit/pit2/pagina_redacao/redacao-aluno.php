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
            <div class="usuario">
                <i class="bi bi-pencil-square"></i>
                <h1>redações</h1>
            </div>
        </div>
        
        <div class="dados">

       
        
        <form action="tema-aluno.php" method="get"> 
            
        
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


$sql = "SELECT * FROM red_textos";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div class=\"conteudos-grid\">";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $tema = $linha["tema"];
        $id = $linha["id"];

        // Verificar se o aluno já enviou a redação para este tema
        $sql_verifica_envio = "SELECT enviado FROM redacoes WHERE id_aluno = $id_aluno AND id_red_textos = $id";
        $resultado_verifica_envio = mysqli_query($conexao, $sql_verifica_envio);

        if (mysqli_num_rows($resultado_verifica_envio) > 0) {
            $redacao_enviada = mysqli_fetch_assoc($resultado_verifica_envio)["enviado"];
        } else {
            $redacao_enviada = 0; // A redação ainda não foi enviada
        }

        // Verificar se já existe uma correção para esta redação
        $sql_verifica_correcao = "SELECT id FROM correcoes WHERE id_redacao IN (SELECT id FROM redacoes WHERE id_aluno = $id_aluno AND id_red_textos = $id)";
        $resultado_verifica_correcao = mysqli_query($conexao, $sql_verifica_correcao);

        if (mysqli_num_rows($resultado_verifica_correcao) > 0) {
            $correcao_disponivel = true;
        } else {
            $correcao_disponivel = false;
        }

        // Renderizar o botão com base nas verificações
        echo "<div>";
        echo "<h3>" . $tema . "</h3>";
        
        if (!$redacao_enviada) {
            echo "<button> <a href=\"tema-aluno.php?id=" . $id . "\">Iniciar</a> </button>";
        } elseif ($correcao_disponivel) {
            echo "<button> <a href=\"ver-correcao.php?id=" . $id . "\">Ver Correção</a> </button>";
        } else {
            echo "<button disabled>Aguardando correção</button>";
        }
        
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Nenhuma proposta encontrada ";
}

mysqli_close($conexao);
?>








        
    
        
        
        
        
        
                
            
            </form>
    </div>
</body>
</html>