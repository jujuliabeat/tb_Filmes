<!-- Parte PHP -->

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connection.php");

$conn = Connection::getConnection();
//print_r($conn);

$msgErro = "";

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
$diretor = isset($_POST['diretor']) ? $_POST['diretor'] : null;
$atores = isset($_POST['atores']) ? $_POST['atores'] : null;
$autores = isset($_POST['autor']) ? $_POST['autor'] : null;
$bsFR = isset($_POST['bas_fatosreais']) ? $_POST['bas_fatosreais'] : null;
$dtLanc = isset($_POST['dt_lancamento']) ? $_POST['dt_lancamento'] : null;

if (isset($_POST['submetido'])) {



    //Validar os dados
    if (!$nome) {
        $msgErro .= "Informe o nome do filme <br>";
    } else if (!$genero) {
        $msgErro .= "Informe o gênero do filme <br>";
    } else if (!$diretor) {
        $msgErro = "Informe o diretor do filme <br>";
    } else if (!$atores) {
        $msgErro = "Informe os atores do filme <br>";
    } else if (!$autores) {
        $msgErro = "Informe o autor do filme <br>";
    } else if (!$dtLanc) {
        $msgErro = "Informe a data de lançamento do filme <br>";
    } else if (!$bsFR) {
        $msgErro = "Informe se o filme é baseado em fatos reais <br>";
    } else {

        $sql = 'INSERT INTO filmes (nome, genero, diretor, atores, autores, bas_fatosreais, dt_lancamento)' .
            ' VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $genero, $diretor, $atores, $autores, $bsFR, $dtLanc]);

        header('Location: filmes.php');
    }
}



?>

<!-- Parte Html -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Filmes - Geovana Santos & Júlia beatriz</title>


</head>

<body>

    <div class="form-container">
        <p class="title">Filmes</p>

        <form action="" method="post" class="form">


            <div class="user-box formulario-item-50 item-esquerda">
                <input type="text" name="nome" placeholder="Informe o nome" id="nome" value="<?php echo "$nome" ?>">
            </div>
            <br><br>

            <div class="user-box">
                <select name="genero" id="genero">
                    <option value="">---Selecione o gênero---</option>

                    <option value="C" <?php echo ($genero == 'C' ? 'selected' : ''); ?>>Comédia</option>
                    <option value="A" <?php echo ($genero == 'A' ? 'selected' : ''); ?>>Animação</option>
                    <option value="D" <?php echo ($genero == 'D' ? 'selected' : ''); ?>>Drama</option>
                    <option value="F" <?php echo ($genero == 'F' ? 'selected' : ''); ?>>Ficção</option>
                    <option value="R" <?php echo ($genero == 'R' ? 'selected' : ''); ?>>Romance</option>
                    <option value="S" <?php echo ($genero == 'S' ? 'selected' : ''); ?>>Suspense</option>
                    <option value="T" <?php echo ($genero == 'T' ? 'selected' : ''); ?>>Terror</option>
                    <option value="O" <?php echo ($genero == 'O' ? 'selected' : ''); ?>>Outros</option>
                </select><br><br>
            </div>

            <div class="user-box formulario-item-50">
                <input type="text" name="diretor" placeholder="Informe o diretor" id="diretor" value="<?php echo "$diretor" ?>" />
                <br><br>
            </div>

            <div class="user-box">
                <input type="text" name="atores" placeholder="Informe os atores" id="atores" value="<?php echo "$atores" ?>" />
                <br><br>
            </div>

            <div class="user-box">
                <input type="text" name="autor" placeholder="Informe o nome dos autores" id="autor" value="<?php echo "$autores" ?>" />
                <br><br>
            </div>

            
                <input type="date" name="dt_lancamento" id="dtLanc" value="<?php echo "$dtLanc" ?>" /> <br><br>

                
                    <legend>Baseado em fatos reais</legend>
                    <input type="radio" name="bas_fatosreais" id="bsFR" value="sim" value="S" <?php echo ($bsFR == 'sim' ? 'checked' : ''); ?> />
                    <label for="bsr">Sim</label>
                    <br>

                    <input type="radio" name="bas_fatosreais" id="bsr2" value="nao" value="N" <?php echo ($bsFR == 'nao' ? 'checked' : ''); ?> />
                    <label for="bsr2">Não</label>
                    <br><br>
            

          <!-- Parte de baixo do form -->

            <input type="hidden" name="submetido" value="1" />

            <div class="forgot">
                <a rel="noopener noreferrer" href="#">Esqueceu a senha ?</a>
            </div>

            <button class="sign" type="submit">Cadastrar</button>
            </form>
            <div class="social-message">
                <div class="line"></div>
                <p class="message">Entrar com contas sociais</p>
                <div class="line"></div>
            </div>
            <div class="social-icons">
                <button aria-label="Log in with Google" class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z"></path>
                    </svg>
                </button>
                <button aria-label="Log in with Twitter" class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path d="M31.937 6.093c-1.177 0.516-2.437 0.871-3.765 1.032 1.355-0.813 2.391-2.099 2.885-3.631-1.271 0.74-2.677 1.276-4.172 1.579-1.192-1.276-2.896-2.079-4.787-2.079-3.625 0-6.563 2.937-6.563 6.557 0 0.521 0.063 1.021 0.172 1.495-5.453-0.255-10.287-2.875-13.52-6.833-0.568 0.964-0.891 2.084-0.891 3.303 0 2.281 1.161 4.281 2.916 5.457-1.073-0.031-2.083-0.328-2.968-0.817v0.079c0 3.181 2.26 5.833 5.26 6.437-0.547 0.145-1.131 0.229-1.724 0.229-0.421 0-0.823-0.041-1.224-0.115 0.844 2.604 3.26 4.5 6.14 4.557-2.239 1.755-5.077 2.801-8.135 2.801-0.521 0-1.041-0.025-1.563-0.088 2.917 1.86 6.36 2.948 10.079 2.948 12.067 0 18.661-9.995 18.661-18.651 0-0.276 0-0.557-0.021-0.839 1.287-0.917 2.401-2.079 3.281-3.396z"></path>
                    </svg>
                </button>
                <button aria-label="Log in with GitHub" class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"></path>
                    </svg>
                </button>
            </div>
            <p class="signup">Não tem conta?
                <a rel="noopener noreferrer" href="#" class=""> Criar</a>
            </p>

    </form>

    </div>
    <div id="divErro" style="color:brown">
        <?php echo "<p>$msgErro</p>"; ?>

    </div>
</span>




    <!-- Listagem dos livros -->

    <?php
    $sql = "SELECT * FROM filmes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    //echo "<pre>" . print_r($result) . "<pre>";

    ?>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Gêrero</td>
            <td>Diretor</td>
            <td>Atores</td>
            <td>Autores</td>
            <td>Baseado em Fatos Reais</td>
            <td>Data de Lançamento</td>

            <td>Excluir</td>


        </tr>

        <?php foreach ($result as $reg) : ?>
            <tr>
                <td> <?php echo $reg['id'] ?> </td>
                <td> <?php echo $reg['nome'] ?> </td>
                <td>
                    <?php

                    switch ($reg['genero']) {
                        case 'D':
                            echo "Drama";
                            break;
                        case  'F':
                            echo "Ficção";
                            break;
                        case 'R':
                            echo "Romance";
                            break;
                        case 'T':
                            echo "Terror";
                            break;
                        case 'O':
                            echo "Outros";
                            break;
                    }

                    ?>
                </td>


                <td> <?php echo $reg['diretor'] ?> </td>
                <td> <?php echo $reg['autores'] ?> </td>
                <td> <?php echo $reg['atores'] ?> </td>


                <td> <?php echo $reg['bas_fatosreais'] ?> </td>
                <td> <?php echo $reg['dt_lancamento'] ?> </td>

                <td> <a href="filmes_del.php?id=<?php echo $reg['id'] ?>" onclick="return confirm('Confirma a exclusão?');">
                        Excluir</a></td>

            </tr>

        <?php endforeach; ?>



    </table>


    <script src="validacao.js"></script>
</body>

</html>