<?php 
    require_once("../db.php");
    $instance = Db :: getInstance();
    $pdo = $instance->getConnection();


    if(isset($_POST['nome_bar'])){
      $nomeBar = $_POST['nome_bar'];
    }

    echo  "<h2>tem a certeza que quer apagar ".$nomeBar."?</h2>
            <form method='post'>
            <input type=hidden name='nome_bar' value='".$nomeBar."'>
            <input type='submit' class='btn btn-success' value='Sim' name='confirm'>
            <input type='submit' class='btn btn-danger' value='Cancelar' name='confirm'>
            </form>
            ";

    if(isset($_POST['confirm'])){
    if($_POST['confirm']=='Sim'){
    $sql="DELETE FROM bar WHERE nome_bar = ?";
    $pdo -> prepare($sql) ->execute(array($nomeBar));
    echo ('<script>
                     window.location.replace("../Ranking.php");
                     </script>');
    }else if($_POST['confirm']=='Cancelar'){
        echo ('<script>
                     window.location.replace("../Ranking.php");
                     </script>');
    }
    }
    ?>