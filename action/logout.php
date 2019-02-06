<?php
session_start();
// remove all session variables
session_unset();

//destroy js cookies
unset($_COOKIE["_CID"]);
setcookie("_CID",null,-1,'/');

//destroy session token in DB
$today=date("Y-m-d");
require_once("../db.php");
$instance = Db :: getInstance();
$pdo = $instance -> getConnection();

$stmt = $pdo-> prepare('Select token,data_expiracao,token_U_ID FROM token WHERE data_expiracao > :today');
$stmt -> execute([':today' => $today]);
 $activetoken= $stmt->fetch();

if($activetoken!=null){
$stmt = $pdo->prepare('DELETE FROM token WHERE token_U_ID = :uid');
$stmt -> execute([':uid' => $activetoken['token_U_ID']]);

};

// destroy the session
session_destroy();

echo ('<script>
        window.location.replace("../Index.php");
        </script>');


?>