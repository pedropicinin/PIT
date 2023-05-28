<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar | Sem Desculpas</title>
    <link rel="stylesheet" href="../cadastro/CADASTRO.css">
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
</body>
<div class="main-cadastro">
        <div class="cadastro-left">
            <img src="../cadastro/cadastro-img.svg" class="img" alt="">
        </div>
        <form action="editar_aluno.php" method="POST">
            <div class="cadastro-right">
                <div class="card-login">
                    <div class="form-header">
                        <div class="login-title">
                            <h1> Deseja editar algum dado? </h1>
                        </div>
                    
                    </div>
                    <div class="input">
                        <div class="input-box">
                            <label for="name">Nome</label>
                            <input id="name" type="text" name="name" placeholder="Digite seu nome" value="<?= $Nome; ?>" disabled required>
                        </div>
                        <div class="input-box">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Digite seu email" value="<?= $Email; ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="number">Telefone</label>
                            <input id="number" type="tel" name="number" placeholder="(xx) xxxxx-xxxx" value="<?= $Telefone; ?>"required>
                        </div>
                        <div class="input-box">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx"
                                pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" value="<?= $CPF; ?>" disabled required>
                        </div>
                        <div class="input-box">
                            <label for="curso">Curso Desejado</label>
                            <input id="curso" type="text" name="curso" placeholder="Digite o curso que deseja"  value="<?= $Curso_Desejado; ?>">
                        </div>
                        <div class="input-box">
                            <label for="instituicao">Instituição que Deseja</label>
                            <input id="instituicao" type="text" name="faculdade"
                                placeholder="Digite a instituição desejada"  value="<?= $Instituição_Desejada; ?>">
                        </div>
                        <div class="input-box">
                            <label for="password">Senha</label>
                            <input id="password" type="password" name="password" placeholder="Digite sua senha"
                                required value="<?= $Senha; ?>" disabled required>
                        </div>
                        <div class="input-box">
                            <label for="Confirmpassword">Confirme sua Senha</label>
                            <input id="Confirmpassword" type="password" name="Confirmpassword"
                                placeholder="Confirme sua senha" required value="<?= $Senha; ?>"  disabled required>
                        </div>
                        <div class="combo">
                            <label for="">Matéria que tem dificuldade:</label>
                            <select class="escolha" name="dificuldade" value="<?= $Materias_Dificuldade; ?>">
                                <option value="Linguagens">Linguagens</option>
                                <option value="Matemática">Matemática</option>
                                <option value="Ciências da Natureza">Ciências da Natureza</option>
                                <option value="Ciências Humanas">Ciências Humanas</option>
                            </select>
                        </div>
                        <div class="combo">
                            <label for="">Matéria que deseja estudar:</label>
                            <select class="escolha" name="MEstudar" value="<?= $Materias_Estudar; ?>">
                                <option value="Linguagens">Linguagens</option>
                                <option value="Matemática">Matemática</option>
                                <option value="Ciências da Natureza">Ciências da Natureza</option>
                                <option value="Ciências Humanas">Ciências Humanas</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label for="horas">Tempo que deseja estudar</label>
                            <input id="horas" type="text" name="horas"
                                placeholder="00:25" value="<?= $Horas_Estudadas; ?>">
                        </div>
                        <?php
                        if ($Notificações == "Sim"){
                            echo '<div class="form-check">
                            <input class="form-check-input" type="radio" name="notificacao" id="notificacao" value="true" checked>
                            <label class="form-check-label" for="notificacao">
                              Sim, eu desejo receber notificação.
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="notificacao" id="notificacao" value="false">
                            <label class="form-check-label" for="notificacao">
                              Não, eu não desejo receber notificação.
                            </label>
                          </div>';
                        }else{
                            echo '<div class="form-check">
                            <input class="form-check-input" type="radio" name="notificacao" id="notificacao" value="false">
                            <label class="form-check-label" for="notificacao">
                              Sim, eu desejo receber notificação.
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="notificacao" id="notificacao" value="true" checked>
                            <label class="form-check-label" for="notificacao">
                              Não, eu não desejo receber notificação.
                            </label>
                          </div>';
                        }
                        ?>                         
                       <input type="submit" class="btn-login" value="Editar!">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
