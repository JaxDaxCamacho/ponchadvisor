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

require_once("db.php");
$instance = Db :: getInstance();
$pdo = $instance -> getConnection();
if (isset($_POST["submit"])){
$searchword = "%".$_POST["search"]."%";
}else $searchword = "";


?>

<div id="ranker">
<table>
        
        <tr id="pesquisa" ><form method="post"><td colspan="3">
        <input id="searchbar" type="text" name="search"></td>
        <td><input type="submit" name="submit" value="Pesquisar"></td>
        </form></tr>

        <?Php

          echo '<tr><th>Nome Real</th><th>Username</th><th>E-mail</th><th>Acesso</th></tr>';
        if (!isset($_POST["submit"])){
            $stmt = $pdo->query('Select * from utilizador');
            foreach($stmt as $row){
                echo "<tr><form action='edituser.php' method='post' ><td>".$row['nome']."</td>
                <td>".$row['username']."</td><td>".$row['u_email']."</td>
                <td>
                <input type=hidden name='nome_user' value='".$row['nome']."'>
                <input class='btn btn-success' type=submit  value='Editar'></form>
                <form action='action/deleteUser.php' method='post'>
                <input type=hidden name='nome_user' value='".$row['nome']."'>
                <input class='btn btn-danger' type=submit  value='Apagar'></form>
                </td>
                </tr>";
            }
        } else $stmt = $pdo->prepare('Select * FROM utilizador WHERE nome LIKE ? OR username LIKE ?  OR u_email LIKE ? ');
                $stmt -> execute(array($searchword,$searchword,$searchword));
                while($row= $stmt->fetch()){
                    echo "<tr><form action='edituser.php' method='post' ><td>".$row['nome']."</td>
                    <td>".$row['username']."</td><td>".$row['u_email']."</td>
                    <td>
                    <input type=hidden name='nome_user' value='".$row['nome']."'>
                    <input class='btn btn-success' type=submit  value='Editar'></form>
                    <form action='action/deleteUser.php' method='post'>
                    <input type=hidden name='nome_user' value='".$row['nome']."'>
                    <input class='btn btn-danger' type=submit  value='Apagar'></form>
                    </td>
                    </tr>";
                }
       
        ?>
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
