<?php 
session_start(); 
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
    $_SESSION['LAST_ACTIVITY'] = $time;
}
$sessionON =session_status() == PHP_SESSION_NONE;
if (!isset($_SESSION["status"])) {
  header('Location: Index.php');
};


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

		<title>Review</title>
	</head>
	<body>
       

    <?php 
    require_once("db.php");
    $instance = Db :: getInstance();
    $pdo = $instance->getConnection();


    if(isset($_POST['nome_bar'])){
      $nomeBar = $_POST['nome_bar'];
      $_SESSION['nome_bar'] =$nomeBar;
    }
    else{
      $nomeBar = $_SESSION['nome_bar'];
    }
 

    //barra de navegação
    require_once("section/navbar.php");
    //displayer dos bares
    require_once("section/bardisplay.php");
    
   require_once("section/avaliar.php");
    // context
    require_once("section/contentext.php");
    //rodapé com links e informação
    require_once("section/footer.php");
    
    ?>



      <!-- Swiper js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
      <!-- bootstrap js -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Jquery JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
    <!-- my js -->
    <script src="script/reviewer.js"></script>
  </body>
    </html>