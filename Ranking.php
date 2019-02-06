<?php session_start();
$time = $_SERVER['REQUEST_TIME'];


$timeout_duration = 1800;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;
$sessionON =session_status() == PHP_SESSION_NONE;
if (!isset($_SESSION["status"])) {
  header('Location: Index.php');};

?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">
		<meta name="description" content="Meta tags">
		<meta name="keywords" content="acin,academy,html">
		<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
		<meta name="author" content="David Camacho">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome css -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Swiper css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
  <!-- my css -->
    <link rel="stylesheet" href="styles/gp18.css">

		<title>Guia Prático 18</title>
	</head>
	<body>

    <?php

require_once("section/navbar.php");
// aqui para alem de pedir a ligação à BD tambem fazemos a verificação se o submit foi chamadado
// para a propia pagina para que possamos correr a pesquisa
require_once("db.php");
$instance = Db :: getInstance();
$pdo = $instance -> getConnection();
if (isset($_POST["submit"])){
$searchword = $_POST["search"];
}else $searchword = "";


?>

<div id="ranker">
<table>
        
        <tr id="pesquisa" ><form method="post"><td colspan="4">
        <input id="searchbar" type="text" name="search"></td>
        <td><input type="submit" name="submit" value="Pesquisar"></td>
        </form></tr>

        <?Php
        // query que corre quando o admnistrador carrega a pagina
        if($_SESSION["admin"]==1){
          echo '<tr><th>Nome Do Bar</th><th>Localização</th><th>Data de Registo</th><th>Descrição</th>
        <th>Classificacao</th><th>Edicao de Admin</th></tr>';
        if (!isset($_POST["submit"])){
            $stmt = $pdo->query('Select * from bar');
            foreach($stmt as $row){
                echo "<tr><form action='editbar.php' method='post' ><td>".$row['nome_bar']."</td><td>".$row['concelho']."</td><td>".$row['data_registo']."</td>
                <td>".$row['descricao']."</td><td>".$row['classificacao']."</td><td>
                <input type=hidden name='nome_bar' value='".$row["nome_bar"]."'>
                <input class='btn btn-success' type=submit  value='Editar'></form>
                <form action='action/delete.php' method='post'>
                <input type=hidden name='nome_bar' value='".$row["nome_bar"]."'>
                <input class='btn btn-danger' type=submit  value='Apagar'></form>
                </td>
                </tr>";
            }
            // query que corre quando o admnistrador faz uma pesquisa
        } else $stmt = $pdo->prepare('Select * FROM bar WHERE nome_bar LIKE :word');
                $stmt -> execute([':word' => '%'.$searchword.'%']);
                while($row= $stmt->fetch()){
                    echo "<tr><form action='editbar.php' method='post' ><td>".$row['nome_bar']."</td>
                    <td>".$row['concelho']."</td><td>".$row['data_registo']."</td>
                    <td>".$row['descricao']."</td><td>".$row['classificacao']."</td><td>
                    <input type=hidden value='".$row["nome_bar"]."'>
                    <input class='btn btn-success' type=submit  value='Editar'></form>
                    <form action='action/delete.php' method='post'>
                    <input type=hidden name='nome_bar' value='".$row["nome_bar"]."'>
                    <input class='btn btn-danger' type=submit  value='Apagar'></form>
                    </td>
                    </tr>";
                }
                // utilizador carrega a pagina
        }else{
        echo '<tr><th>Nome Do Bar</th><th>Localização</th><th>Data de Registo</th><th>Descrição</th>
        <th>Classificacao</th><th>Avaliar o bar que visitou</th></tr>';
        if (!isset($_POST["submit"])){
            $stmt = $pdo->query('Select * from bar');
            foreach($stmt as $row){
                echo "<tr><form action='review.php' method='post' ><td>".$row['nome_bar']."</td><td>".$row['concelho']."</td><td>".$row['data_registo']."</td>
                <td>".$row['descricao']."</td><td>".$row['classificacao']."</td><td>
                <input class='btn btn-success' type=submit name='nome_bar' value='".$row["nome_bar"]."'></form></td>
                </tr>";
                // utilizador pesquisa
            }
        } else $stmt = $pdo->prepare('Select * FROM bar WHERE nome_bar LIKE :word');
                $stmt -> execute([':word' => '%'.$searchword.'%']);
                while($row= $stmt->fetch()){
                    echo "<tr><form action='review.php' method='post' ><td>".$row['nome_bar']."</td>
                    <td>".$row['concelho']."</td><td>".$row['data_registo']."</td>
                    <td>".$row['descricao']."</td><td>".$row['classificacao']."</td><td>
                    <input class='btn btn-success' type=submit name='nome_bar' value='".$row["nome_bar"]."'></form></td>
                    </tr>";
                }
              }
        ?>
        <tr><td colspan="5">Registar um novo bar para avaliação</td><td> <a href="register.php" class="btn btn-primary">REGISTAR</a></td></tr>
</table>

</div>







<?php    
//rodapé com links e informação
require_once("section/footer.php");
?>



      <!-- bootstrap js -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
    </html>
