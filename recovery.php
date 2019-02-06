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
    <form method=get>
 <input hidden type=text name="rec_token"><br>
</form> 

          
          <?php 
    $today=date("Y-m-d");

   require_once("db.php");
    $instance = Db :: getInstance();
    $pdo = $instance -> getConnection();
    $t1=null;
    if(isset($_REQUEST['rec_token'])){
    $t1 = $_REQUEST['rec_token'];
    };
    //barra de navegação
    require_once("section/navbar.php");
// Encryptação da password com o Bcrypt usando o salt feito aleatoriamente
    if($t1!=null){
        require_once("section/passwordreset.php");
        if(isset($_POST["submit"])){
        $pass=$_POST["password"];
        $pass2=$_POST["password2"];
        if($pass==$pass2){
            $hashed_password = password_hash($pass,PASSWORD_BCRYPT,["salt" => "njkrgranjrgnfgdmnfgdnjkfgenjk"]);
            $stmt =$pdo->prepare("UPDATE utilizador SET u_password=? WHERE recov_token = ? ");
            $stmt->execute(array($hashed_password,$t1));
            $_SESSION["status2"]="Password has been reset";
            $stmt =$pdo->prepare("UPDATE utilizador SET recov_token=NULL WHERE recov_token = ? ");
            $stmt->execute(array($t1));
            echo ('<script>
            window.location.reload("Index.php");
            </script>');
        }else{
            
        };
        };

    } else {
        //conteudo slider imagens
    require_once("section/recoveryform.php");

    
    if(isset($_POST["submit"])){
        $nome=$_POST["nome"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $date= date("Y/m/d");
        $token= bin2hex(random_bytes(32));

         
         $stmt =$pdo->prepare("UPDATE utilizador SET recov_token=? WHERE nome = ? AND username = ? AND u_email= ?");
         $stmt->execute(array($token,$nome,$username,$email));
         $recov = $stmt->fetch();

        $linker="http://localhost/scripts/ST/GP18/recovery.php?rec_token=".$token;
        $linker = wordwrap($linker);
        $headers = "From: joaodavidosky@gmail.com" . "\r\n" .
            "CC: joaodavidosky@gmail.com";
        mail($email,"Password recovery",$linker,$headers);
        echo '<style>h2 {margin:4em; color:lightgreen;}</style><h2>Foi enviado um email com um link para fazer reset da password</h2>';
        echo 'http://localhost/scripts/ST/GP18/recovery.php?rec_token='.$token;
    

    };
};

    ;
    

    require_once("section/footer.php");
    
    
    ?>

    <!-- bootstrap js -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
    </html>