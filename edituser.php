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

if(isset($_POST['nome_user'])){
    $nomeUser = $_POST['nome_user'];
    $_SESSION['oldname']=$nomeUser;
    $stmt = $pdo->prepare("SELECT nome,username,u_email FROM utilizador WHERE nome = ?");
    $stmt->execute(array($nomeUser));
    $userResult=$stmt->fetch();
  }

if(isset($_POST["editado"])){
    $nome=$_POST["nome"];
    $username=$_POST["username"];
    $email=$_POST["email"];
 

    $stmt = "UPDATE utilizador SET nome= ?,username=? , u_email=? WHERE nome=?";
    $pdo->prepare($stmt) -> execute(array($nome,$username,$email,$_SESSION['oldname']));

    echo ('<script>
    window.location.replace("users.php");
    </script>');
}

?>


<div id="registo">

<form method="post">
<div class="form-group">
<label >Nome Completo</label>
<input  required type="text" name="nome" class="form-control" value="<?php echo$userResult['nome']?>" aria-describedby="BarName" placeholder="John Doe da Silva">

</div>
<div class="form-group">
<label >Nome de Utilizador</label>
<input  required type="text" name="username" class="form-control" value="<?php echo$userResult['username']?>"  placeholder="JohnSilvas">
</div>
<div class="form-group">
<label >E-mail</label>
<input required type="email" name="email" class="form-control" value="<?php echo$userResult['u_email']?>"  placeholder="Mensagem rapida">
<small class="form-text text-muted">O seu e-mail nunca será partilhado com ninguem</small>
</div>
<div class="form-group">



<button type="submit" name="editado" class="btn btn-primary">Submit</button>
</form>   
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
