<?php
define("NUM_PAGE",10);
// Singleton to connect db.
class Db{
// Hold the class instance.
private static $instance = null;
private $pdo;

private $host = 'localhost';
private $user = 'db user-name';
private $pass = 'db password';
private $name = 'db name';

// The db connection is established in the private constructor.
private function __construct()
{
  $host = '127.0.0.1';
  $name   = 'gp_20';
  $user = 'root';
  $pass = '';
  $charset = 'utf8';

//   $this->pdo = new PDO("mysql:host={$this->host};
//   dbname={$this->name}", $this->user,$this->pass,
//   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
// }

  //Permite definir a configuração da base de dados
  $dsn = "mysql:host=$host;dbname=$name;charset=$charset";


  $opt = array(
  //Em caso de erro ocorre excepcao
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   
  //Define o comportamento por defeito do fetch
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  //Ativa/desativa emular prepared statements     
  PDO::ATTR_EMULATE_PREPARES   => false,                
  );
  $this->pdo = new PDO($dsn, $user, $pass, $opt);   
}

/**
 * Retorna a instancia unica do databa
 * @return [type] [description]
 */
public static function getInstance()
{
  if(!self::$instance)
  {
  self::$instance = new Db();
  // echo "<br><h1>conectado</h1>";
}

return self::$instance;
}

public function getConnection()
{
  return $this->pdo;
}
}