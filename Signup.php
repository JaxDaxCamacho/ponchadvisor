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
$pdo = $instance -> getConnection();
if(isset($_POST["submit"])){
    $nome=$_POST["nome"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $pass2=$_POST["password2"];
    $date= date("Y/m/d");

    if($pass==$pass2){
      $hashed_password = password_hash($pass,PASSWORD_BCRYPT,["salt" => "njkrgranjrgnfgdmnfgdnjkfgenjk"]);
        $stmt = "INSERT INTO utilizador (nome,username,u_email,u_password) VALUES (?,?,?,?)";
        $pdo->prepare($stmt) -> execute(array($nome,$username,$email,$hashed_password));
        echo '<style>h2 {margin:4em; color:lightgreen;}</style><h2>Utilizador foi Registado Com Sucesso</h2>';
    
    }
    else{
        echo '<style>h2 {margin:4em; color:red;}</style><h2>As passwords não são iguais</h2>';
    }

    
};

    //barra de navegação
    require_once("section/navbar.php");
    //conteudo slider imagens
    require_once("section/signupform.php");

    require_once("section/footer.php");
    
    
    ?>

    <!-- bootstrap js -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
    </html>