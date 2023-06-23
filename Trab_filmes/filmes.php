<!-- Parte PHP -->

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("Connection.php");

$conn = Connection::getConnection();
//print_r($conn);

if (isset($_POST['submetido'])) {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : null;
    $diretor = isset($_POST['diretor']) ? $_POST['diretor'] : null;
    $atores = isset($_POST['atores']) ? $_POST['atores'] : null;
    $autores = isset($_POST['autor']) ? $_POST['autor'] : null;
    $bsFR = isset($_POST['bas_fatosreais']) ? $_POST['bas_fatosreais'] : null;
    $dtLanc = isset($_POST['dt_lancamento']) ? $_POST['dt_lancamento'] : null;
   

    $sql = 'INSERT INTO filmes (nome, genero, diretor, atores, autores, bas_fatosreais, dt_lancamento)' .
        ' VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $genero, $diretor, $atores, $autores, $bsFR, $dtLanc]);

    header('Location: filmes.php');
}
?>

<!-- Parte Html -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Filmes</title>


</head>
<body style="margin:30px; ">
    <h2>Cadastro de filmes</h2>


    <h3>Formulário de filmes</h3>

    <form action="" method="post" onsubmit="validarFilme();">
        <input type="text" name="nome" placeholder="Informe o nome" id="nome">
        <br><br>

        <select name="genero" id="genero">
            <option value="">---Selecione o gênero---</option>
            
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="s">Suspense</option>
            <option value="T">Terror</option>
            <option value="O">Outros</option>
        </select><br><br>

        <input type="text" name="diretor" placeholder="Informe o diretor" id="diretor" />
        <br><br>

        <input type="text" name="atores" placeholder="Informe os atores" id="atores"/>
        <br><br>

        <input type="text" name="autor" placeholder="Informe o nome dos autores" id="autor"/>
        <br><br>

        <input type="date" name="dt_lancamento" id="dtLanc">
        <br><br>
        
        
       

            <legend>Baseado em fatos reais</legend>
            <input type="radio" name="bas_fatosreais" id="bsFR" value="sim"/>
            <label for="bsr">Sim</label>
            <br>

            <input type="radio" name="bas_fatosreais" id="bsr2" value="nao" />
            <label for="bsr2">Não</label>
            <br><br>

            

        <button type="submit">Cadastrar</button><br><br>

        <input type="hidden" name="submetido" value="1" />

    
    </form>
    <div id="divErro">

    </div>

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

                <td> <a href="filmes_del.php?id=<?php echo $reg['id'] ?>"
                onclick="return confirm('Confirma a exclusão?');">
                        Excluir</a></td>

            </tr>

        <?php endforeach; ?>



    </table>
    <script src="validacao.js"></script>
</body>
</html>