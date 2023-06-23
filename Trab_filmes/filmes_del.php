<?php
require_once("Connection.php");
    
$id = isset ($_GET['id']) ? $_GET['id'] : null;

if($id){
    $conn = Connection::getConnection();
    $sql = "DELETE FROM filmes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

   //Voltar para a página de livros
    header("Location: filmes.php");
}else {
    echo "Id não informado";
    echo "<br><br>";
    echo "<a href='filmes.php'>Volte</a>";
}


?>