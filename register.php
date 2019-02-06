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
if(isset($_POST["submit"])){
    $nome=$_POST["nome"];
    $localizacao=$_POST["concelho"];
    $descricao=$_POST["descricao"];
    $stars=$_POST["stars"];
    $date= date("Y/m/d");

    $stmt = "INSERT INTO bar (nome_bar,concelho,descricao,classificacao,data_registo) VALUES (?,?,?,?,?)";
    $pdo->prepare($stmt) -> execute(array($nome,$localizacao,$descricao,$stars,$date));
    echo '<style>h2 {margin:4em; color:lightgreen;}</style><h2>Bar Registado Com Sucesso</h2>';
}

?>

<div id="registo">

            <form method="post">
            <div class="form-group">
            <label >Nome do bar</label>
            <input type="text" name="nome" class="form-control" aria-describedby="BarName" placeholder="Sem espaços">
            <small class="form-text text-muted">Se o nome do bar tiver caracteres especiais insira o equivalente</small>
        </div>
        <div class="form-group">
            <label >Localização</label>
            <input type="text" name="concelho" class="form-control"  placeholder="Concelho/cidade">
        </div>
        <div class="form-group">
            <label >Descrição</label>
            <input type="text" name="descricao" class="form-control"  placeholder="Mensagem rapida">
        </div>
        <div class="form-group">
            <label >Classificação</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="stars" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="stars" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="stars" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="stars" value="3.5" /><label class="half" for="star3half" title="Goodish - 3.5 stars"></label>
                            <input type="radio" id="star3" name="stars" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="stars" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="stars" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="stars" value="1.5" /><label class="half" for="star1half" title="very bad - 1.5 stars"></label>
                            <input type="radio" id="star1" name="stars" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="stars" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
