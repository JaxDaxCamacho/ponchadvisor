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
    $today=date("Y-m-d");
    require_once("db.php");
    $instance = Db :: getInstance();
    $pdo = $instance->getConnection();

    
    $stmt = $pdo->prepare('Select token,data_expiracao,token_U_ID FROM token WHERE data_expiracao > ? AND token = ?');
    if(isset($_COOKIE['_CID'])){
    $stmt->execute(array($today,$_COOKIE['_CID']));
  };
    $activetoken= $stmt->fetch();

     
    

if($activetoken!=null){
    $stmt = $pdo->prepare('Select username,U_ID,u_email FROM utilizador WHERE U_ID = :uid');
    $stmt -> execute([':uid' => $activetoken['token_U_ID']]);
    $userver = $stmt->fetch();
    $_SESSION["status"]="".$userver['u_email'];
  }
  else{
    $stmt = $pdo-> prepare('Select token,data_expiracao,token_U_ID FROM token WHERE data_expiracao < :today');
    $stmt->execute([':today' => $today]);
    $expiredtoken= $stmt->fetchall();

       if($expiredtoken!=null){
         for($i=0;$i<count($expiredtoken);$i++){
         $stmt = $pdo->prepare('DELETE FROM token WHERE token_U_ID = :uid');
      $stmt->execute([':uid' => $expiredtoken[$i]['token_U_ID']]);
         }
      session_unset();
      session_destroy();
       }
    
  };


    //barra de navegação
    require_once("section/navbar.php");
    //conteudo slider imagens
    require_once("section/content.php");
     //conteudo texto
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
    <!-- my js -->
    <script src="script/slider.js"></script>
  </body>
    </html>
