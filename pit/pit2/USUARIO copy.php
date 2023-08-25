<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Perfil </title>
    <link rel="stylesheet" href="USUARIO.css">
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
        
        $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
        $resultado = $conexao->query($sql);
        
        
        if ($resultado->num_rows > 0) {
            // Exibe os atributos do aluno
            while ($row = $resultado->fetch_assoc()) {
                $idAluno = $row["id_aluno"];
                $Nome = $row["nome"];
                $CPF = $row["cpf"];
                $Telefone = $row["telefone"] ;
                $Email = $row["email"] ;
                $Senha = $row["senha"] ;
                $Curso_Desejado = $row["curso_desejado"] ;
                $Instituição_Desejada =$row["instituicao_desejada"]  ;
               $Materias_Estudar = $row["materias_estudar"];
                $Materias_Dificuldade = $row["materias_dificuldade"];
                $Horas_Estudadas = $row["horas_estudadas"];
                $Notificações = ($row["notificacoes"] ? "Sim" : "Não");
            }
        } else {
            echo "Nenhum aluno encontrado com o ID informado.";
        }       
        $conexao->close();
    } else {
        echo "Você não está logado.";
    }
    ?>

    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list"></i>
        </div>

        <ul>
            <li class="item-menu">
                <a href="C:\Users\Gustavo\Documents\GitHub\PIT\pit\landingpage\index.html">
                    <span class="icon"><i class="bi bi-house-door"></i></i></i></span>
                    <span class="txt-link">Home</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="INICIAL.html">
                    <span class="icon"><i class="bi bi-columns-gap"></i></i></span>
                    <span class="txt-link">Dashboard</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-card-text"></i></span>
                    <span class="txt-link">Conteúdos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
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
                <a href="CONFIGURACOES.html">
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
                <i class="bi bi-person-circle"></i>
                <h1>nome do usuario</h1>
                <h5>professor ou aluno</h5>
            </div>
            <div class="dados">
                <h1>nome</h1>
                <h5 value="<?= $Nome; ?>"></h5>
                <h1>cpf</h1>
                <h5 value="<?= $CPF; ?>"></h5>
                <h1>email</h1>
                <h6> <a href="EMAIL.html"> atualizar email </a></h6>
                <h5 value="<?= $Email; ?>"></h5>
                <h1>telefone</h1>
                <h6> <a href="TELEFONE.html"> atualizar telefone </a></h6>
                <h5 value="<?= $Telefone; ?>"></h5>
                <h1>senha</h1>
                <h6> <a href="SENHA.html"> atualizar senha </a></h6>

                <h5 value="<?= $Senha; ?>"></h5>
            </div>
            <div class="grafico">
                <h1>horas estudadas</h1>
                <h5>humanas</h5>  
                <h5>redação</h5>
                <h5>linguagens</h5>
                <h5>exatas</h5>  
            </div>
            <div class="premium">
                <h1>Venha para o premium</h1>
                
                <button>Ver o plano agora</button>
            </div>
        </div>
    </div>

</body>
</html>