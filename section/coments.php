<?php 
// isto mostra os ultimos 3 comentários dos ultimos 15 dias.
$expDate =new DateTime($today);
$expDate->modify('-15days');
$thismonth=$expDate->format('Y-m-d');


$stmt = $pdo->prepare('Select * FROM comentario WHERE data_comentario > ? ORDER BY data_comentario DESC');
$stmt -> execute(array($thismonth));

for($i=0;$i<3;$i++){
  $listacoments= $stmt->fetch();
  $c=0;
  $class=$listacoments["classificacao"];
  echo '<div id="comentario"><p>'.$listacoments["titulo"].'</p>
  <p>'.$listacoments["avaliacao"].'</p>
  <p>'.$listacoments["data_visita"].'</p>';
  while($c<$class){
    echo '<i class="fa fa-star" aria-hidden="true"></i>';
    $c++;
  }
  echo '</div>';
}


?>