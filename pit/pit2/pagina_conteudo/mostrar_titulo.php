<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Conteudos </title>
    <link rel="stylesheet" href="CONTEUDO_P.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list"></i>
        </div>

        <ul>
            <li class="item-menu">
                <a href="../pagina usuario/INICIAL_PROFESSOR.html">
                    <span class="icon"><i class="bi bi-columns-gap"></i></i></span>
                    <span class="txt-link">Dashboard</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../pagina conteudo/CONTEUDO_PRINCIPAL.html">
                    <span class="icon"><i class="bi bi-card-text"></i></span>
                    <span class="txt-link">Conteúdos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../pagina_provas/PROVA_P.html">
                    <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                    <span class="txt-link">Provas</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-chat-dots"></i></span>
                    <span class="txt-link">Chat</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-graph-up"></i></span>
                    <span class="txt-link">Desempenho</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../pagina configuracao/CONFIGURACOES.html">
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

        <div class="perfil">
          <a href="USUARIO_PROFESSOR.php"> <div class="circlewhite">
              <i class="bi bi-person-circle"></i>            </div>
      <div>
      <h4>  perfil </h4></a>

    </div>

        <div class="config">
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="104" viewBox="0 0 90 104" fill="none">
                <path d="M26.1765 28.5293L63.8235 28.5293M26.1765 44.9999H49.7059M18.4118 66.1764H85V82.6469C85 91.7293 77.6118 99.1175 68.5294 99.1175H21.4706C12.3882 99.1175 5 91.7293 5 82.6469V79.5881C5 72.1999 11.0235 66.1764 18.4118 66.1764Z" stroke="black" stroke-width="9" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 80.2941L5 28.5294C5 9.70588 9.70588 5 28.5294 5L61.4706 5C80.2941 5 85 9.70588 85 28.5294V75.5882C85 76.247 85 76.9059 84.9529 77.5647" stroke="black" stroke-width="9" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>         
          <h1> Conteúdos  </h1>
        </div>
    </div>

    <div class="container">
            
        <form action="BLOCO_MATERIA.php" method="get"> 
            
        
        <?php

require("config.php");

$disciplina = $_POST["disciplina"];

$sql = "SELECT * FROM conteudos WHERE disciplina = '$disciplina'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div class=\"conteudos-grid\">";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $titulo = $linha["titulo"];
        $id = $linha["id"];

        echo "<div >";
        echo "<h5>" . $titulo . "</h5>";
        echo "<a href=\"BLOCO_MATERIA.php?id=" . $id . "\" target=\"_blank\">Ver detalhes</a>";
        
        
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Nenhum conteúdo encontrado para a disciplina " . $disciplina;
}

mysqli_close($conexao);
?>






        
    
    </form>
</div>


</body>
</html>
