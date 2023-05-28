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
        $id_professor = $_SESSION['usuario'];
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        $sql = "SELECT * FROM professor WHERE id_professor = $id_professor";
        $resultado = $conexao->query($sql);
        
        
        if ($resultado->num_rows > 0) {
            // Exibe os atributos do aluno
            while ($row = $resultado->fetch_assoc()) {
                $idProfessor = $row["id_professor"];
                $Nome = $row["nome"];
                $CPF = $row["cpf"];
                $Telefone = $row["telefone"] ;
                $Email = $row["email"] ;
                $Senha = $row["senha"] ;
                $Materia_Lecionar = $row["materia_lecionar"] ;
          
                
            }
        } else {
            echo "Nenhum professor encontrado com o ID informado.";
        }       
        $conexao->close();
    } else {
        echo "Você não está logado.";
    }
    ?>
</body>
<body>
    <div class="main-cadastro">
        <div class="cadastro-left">
            <img src="cadastro-img.svg" class="img" alt="">
        </div>
            <form action="back_ed_professor.php" method="POST">
            <div class="cadastro-right">
                <div class="card-login">
                <div class="form-header">
                    <div class="login-title">
                        <h1>Deseja editar algum dado?</h1>
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
                            <input id="number" type="tel" name="number" placeholder="(xx) xxxxx-xxxx" value="<?= $Telefone; ?>" required>
                        </div>
                        <div class="input-box">
                            <label for="number">CPF</label>
                            <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"
                            value="<?= $CPF; ?>" disabled required>
                        </div>
                        <div class="input-box">
                            <label for="password">Senha</label>
                            <input id="password" type="password" name="password" placeholder="Digite sua senha"  value="<?= $Senha; ?>" disabled required>
                        </div>
                        <div class="input-box">
                            <label for="Confirmpassword">Confirme sua Senha</label>
                            <input id="Confirmpassword" type="password" name="Confirmpassword" placeholder="Confirme sua senha"  value="<?= $Senha; ?>" disabled required>
                        </div>
                        <div class="materia">
                            <label for="">Matéria que deseja ensinar:</label>
                        <select class="escolha" name="materia_lecionar"  value="<?= $Materia_Lecionar; ?>">
                            <option value="Linguagens">Linguagens</option>
                            <option value="Matemática">Matemática</option>
                            <option value="Ciências da Natureza">Ciências da Natureza</option>
                            <option value="Ciências Humanas">Ciências Humanas</option>
                        </select>
                        </div>
                        <input type="submit" class="btn-login" value="Editar!">
                    </div>
                </div>
            </div>
            </form>
    </div>

</html>
