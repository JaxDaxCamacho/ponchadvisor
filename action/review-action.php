
<?php
session_start();

require_once("../db.php");
    $instance = Db :: getInstance();
    $pdo = $instance->getConnection();

$nomeBar = $_POST['nome_bar'];
$stars = test_input($_POST["stars"]);
$title = test_input($_POST["title"]);
$eval = test_input($_POST["eval"]);
$date= test_input($_POST["date"]);

$_SESSION["message"] ="";




$_SESSION["bar"] = array();
$today= date('Y-m-d');


function test_input($data){
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

$stmt =$pdo->prepare("SELECT * FROM bar WHERE nome_bar = ?");
$stmt->execute(array($nomeBar));
$barver=$stmt->fetch();

$stmt =$pdo->prepare("SELECT U_ID FROM utilizador WHERE u_email = ?");
$stmt->execute(array($_SESSION["status"]));
$UID=$stmt->fetch();

   //validação e tratamento do upload da imagem
   $target_dir = "../uploads/";
   $newimagename = $nomeBar.$_SESSION["status"].date("Y-m-d");
   $target_file = $target_dir.basename($_FILES['image']['name']);
   $uploadOK=1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
   //verificação/validações se o ficheiro é mesmo uma imagem, através da verificação do tamanho da imagem.
   if(isset($_POST["submit"])) {
       $check = getimagesize($_FILES["image"]["name"]);
       if($check !== false) {
           $_SESSION["message"]=$_SESSION["message"]." \n ficheiro é uma imagem - " . $check["mime"] . ".";
           $uploadOk = 1;
       } else {
           $_SESSION["message"]=$_SESSION["message"]."\n Este ficheiro não é uma imagem.";
           $uploadOk = 0;
       }
   };
   // verificação do tamacho do ficheiro
   if ($_FILES["image"]["size"] > 250000) {
       $_SESSION["message"]=$_SESSION["message"]."\n Este ficheiro excede o tamanho maximo";
       $uploadOk = 0;
   }; 
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
       $_SESSION["message"]=$_SESSION["message"]."\n Apenas formatos JPG, JPEG e PNG são permitidos";
       $uploadOk = 0;
   };

   $target_file = trim($target_dir.$newimagename.".".$imageFileType);
   if($uploadOK==0){
       $_SESSION["message"]=$_SESSION["message"]."\n O seu ficheiro não foi carregado";
   } else{
       if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
             $_SESSION["message"]=$_SESSION["message"]."\n O ficheiro". basename( $_FILES["image"]["name"])." has been uploaded.";
       } else {
             $_SESSION["message"]=$_SESSION["message"]."\n algo correu mal";
       }
   };

if(empty($stars) || empty($title) || empty($eval) || empty($date) || $uploadOK==0)
    { 

        $_SESSION["message"] = $_SESSION["message"]."\n Houve um erro ao submeter a Avaliação";
        $_SESSION["nome_bar"]=$nomeBar;
        $_SESSION["stars"]=$stars;
        $_SESSION["title"]=$title;
        $_SESSION["eval"]=$eval;
        $_SESSION["date"]=$date;
        echo ('<script>
        window.location.replace("../section/eval.php?");
        </script>');
        
    }
else{
       
        $stmt=$pdo->prepare("INSERT INTO comentario (titulo,avaliacao,classificacao,data_comentario,data_visita,idbar,idutilizador) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute(array($title,$eval,$stars,$today,$date,$barver['id'],$UID['U_ID']));
         $_SESSION["message"] =  $_SESSION["message"]."\n Sucesso! A sua Avaliação foi Gravada!";

        //Insert the image name and image content in image_table
        if($target_file!=null){
        $stmt=$pdo->prepare("INSERT INTO anexo (nome,url_img) VALUES (?,?)");
        $stmt->execute(array($newimagename,$target_file.$imageFileType));
        
        // Comentario_has_anexos
        $stmt=$pdo->prepare("SELECT id FROM comentario WHERE titulo = ? AND idutilizador= ? AND data_visita =?");
        $stmt->execute(array($title,$UID['U_ID'],$date));
        $comenID=$stmt->fetch();
        var_dump($comenID);

        $stmt=$pdo->prepare("SELECT id FROM anexo WHERE nome = ? AND url_img = ?");
        $stmt->execute(array($newimagename,$target_file.$imageFileType));
        $anexID=$stmt->fetch();

        $stmt=$pdo->prepare("INSERT INTO comentario_has_anexo(comentario_id,anexo_id) VALUES (?,?)");
        $stmt->execute(array($comenID["id"],$anexID["id"]));

        }
        echo ('<script>
        window.location.replace("../section/eval.php?");
        </script>');
    }

     

?>