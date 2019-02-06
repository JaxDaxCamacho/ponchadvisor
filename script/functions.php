

<?php

function ellipsisText($string ,$maxWords){
    $maxWords = 6;
// se o tamanho da string for maior que o máximo de palavras adiciona reticiencias
    if (strlen($string) > $maxWords) {
        $string = substr($string, 0, $maxWords) . '...';
    }

    return $string;
}

// Esta função retorna parágrafos com a informação iseridas pelo utilizador 
    function getMappingBarsDetails(array $array){
        $infor = array ("Nome do bar:","Morada:","Coordenadas GPS:","Classificação:","Número de gostos:");
    
        $final = array_combine($infor,$array);
            for($i = 0; $i < count($infor);$i++){
                echo $infor[$i].' ';
                echo $final[$infor[$i]]. '<br>';
            }
        }
        $bar = array ("Serra de agua","madeira","231231,123123","5estrelas","555");
        getMappingBarsDetails($bar);

// Ultimos comentarios /avaliaçoes
    $comentario = array("otimo","mau","bad","pessimo","terrivel");
 
    function getLastEvaluations($comentario){

    $ultimoscoments = array_slice($comentario,-3);
       foreach ($ultimoscoments as $comentar => $value){
           echo "<br>  $value ";
       }
}

// Função para carrossel adicionar imagens 
    function getMainCarrousel($items){
        $fotos = array ('imagem1.jpg','imagem2.jpg','imagem3.jpg');
         echo '<img src="'.$fotos[$items].'" height ="500px" width= "250px" >';  
    }

?>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class=""></li>
            <li data-target="#carousel" data-slide-to="1" class="active"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
    <div class="carousel-inner">

            <div class="item">
            <?php getMainCarrousel($items=0) ?>
            </div>
            <div class="item active">
            <?php getMainCarrousel($items=1) ?>
            </div>
            <div class="item">
            <?php getMainCarrousel($items=2) ?>
            </div>
    </div>
    <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    