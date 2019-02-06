<?php 
// mensagem de diagnostico para a submissão de comentários.Contem os possiveis erros.
session_start();
if(isset($_SESSION["message"])){
    echo ("".$_SESSION["message"]);
};
?>
<a href="../review.php"><h2>Voltar</h2></a>