<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Prova </title>
    <link rel="stylesheet" href="BLOCO_PROVA.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

<?php

require("config.php");

$id = $_GET["id"];

$sql = "SELECT * FROM provas WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $nomeC = $linha["nome_concurso"];
    $ano = $linha["ano"];
    $gabarito = $linha["nome_arquivo_gabarito"];
    $prova = $linha["nome_arquivo_prova"];

    
    $targetDir = 'c:\wamp64\www\PIT\pit\uploadsPDF';


$targetFileProva = $targetDir . "/"  . $prova;

$targetFileG = $targetDir . "/"  . $gabarito;




    if (file_exists($targetFileG)) {
        // Read the file contents
        $file = file_get_contents($targetFileG);

        // Download the file
        if (isset($_POST["download"])) {
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=$gabarito");
            echo $file;
        }
    } else {
        echo "Arquivo não encontrado.";
    }

} else {
    echo "Nenhuma prova encontrado para o ID " . $id;
}
mysqli_close($conexao);
?>



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
            <svg xmlns="http://www.w3.org/2000/svg" width="114" height="104" viewBox="0 0 114 104" fill="none">
                <path d="M56.5 56.875H75M56.5 75.3749H93.5M93.5 16.4062C93.5 22.1412 88.8288 26.8125 83.0938 26.8125H66.9063C64.0388 26.8125 61.4487 25.6562 59.5525 23.76C57.6562 21.8637 56.5 19.2737 56.5 16.4062C56.5 10.6712 61.1713 6 66.9063 6L83.0938 6C85.9613 6 88.5513 7.15625 90.4475 9.0525C92.3438 10.9487 93.5 13.5387 93.5 16.4062Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M112 34.9062V79.9999C112 93.8749 103.721 98.4999 93.5 98.4999H56.5C46.2787 98.4999 38 93.8749 38 79.9999V34.9062C38 19.875 46.2787 16.4062 56.5 16.4062C56.5 19.2737 57.6562 21.8637 59.5525 23.76C61.4487 25.6562 64.0388 26.8125 66.9063 26.8125H83.0938C88.8288 26.8125 93.5 22.1412 93.5 16.4063C103.721 16.4063 112 19.875 112 34.9062Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>         
              
          <h1><?php echo $nomeC, " - ", $ano; ?> </h1>
        </div>

        <div class="concluido1"> 
            <button> <a href="../pagina_provas/PROVA_P.html"> voltar </a> </button>
        </div>
        

        <div class="container">
          

        <form action="" method="post">
        

            <div class="cont2">  
                    <div class="materia">
<iframe src="exibir_pdf.php?id=<?php echo $id; ?>" width="100%" height="500px"></iframe>

                    </iframe>

                                    
                     </div>

            </div>

            <div class="cont3"> 
                
    
                <div class="anexos">
                <p> gabarito: </p>
                    <div class="baixar">
                    <input type="submit" name="download" value="Baixar">
                   
                    </a>
                    </div>
                </div>
                
            </div>
           
           
       
        </form>

        </div>
           
    </div>
 
</body>
</html>