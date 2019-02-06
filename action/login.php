<?php 
session_start();
$userino=test_input($_POST["Username"]);
$passino=test_input($_POST["Password"]);
$remenber = isset($_POST["remenber"]);
$today=date("Y-m-d");

$userver="";


$hashed_password = password_hash($passino,PASSWORD_BCRYPT,["salt" => "njkrgranjrgnfgdmnfgdnjkfgenjk"]);

require_once("../db.php");
$instance = Db :: getInstance();
$pdo = $instance -> getConnection();

// statement para encontrar um user com o mesmo nome na DB
$stmt = $pdo->prepare('Select username,U_ID,u_email,adminaccess FROM utilizador WHERE username = :user');
 $stmt -> execute([':user' => $userino]);
 $userver=$stmt->fetch();
// se existir então corre uma verificação semelhante para a password hashed e corre o cookie maker se o remeber me
if($userver!=false){
    $stmt = $pdo->prepare('Select U_ID FROM utilizador WHERE u_password = ? AND username = ?' );
     $stmt -> execute(array($hashed_password,$userver['username']));
    $passver=$stmt->fetch();
        if($passver!=false){
            $_SESSION["status"]=$userver['u_email'];
            $_SESSION["admin"]=$userver['adminaccess'];
            //creating a token and sending it to the db
                if($remenber){
                    
                    $UID=$userver['U_ID'];
                    
                    $expDate =new DateTime($today);
                    date_add($expDate,date_interval_create_from_date_string('30 days'));
                    $expDate->modify('+30days');

                    $token= bin2hex(random_bytes(32));
                    $sql="INSERT INTO token (token,data_expiracao,token_U_ID) VALUES (?,?,?)";
                    $pdo -> prepare($sql) ->execute(array($token,$expDate->format('Y-m-d'),$UID));
                    
                    // creating a cookie with the same token
                    $cookie_name = "_CID";
                    $cookie_value = $token;
                    setcookie($cookie_name,$cookie_value,time() + (86400 * 30),"/");
                    echo ('<script>
                     window.location.replace("../Index.php");
                     </script>');
                }


            echo ('<script>
                window.location.replace("../Index.php");
                </script>');
            }else {
                $_SESSION["status2"]="Wrong Password";
                echo ('<script>
                window.location.replace("../Index.php");
                </script>');
            }
           }
                else {
                    $_SESSION["status2"]="Wrong Username";
                    echo ('<script>
                    window.location.replace("../Index.php");
                    </script>');
                }




function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};












var_dump($userino,$userver);
?>