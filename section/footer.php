
<!-- rodapé presente em todas as paginas, vista de admin/utilizador-->
<div id="footer">
<div class="appendix text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <p>&copy 2017 - Todos os direitos reservados a ponchaadvisor</p>
                </div>
                <div class="col-md-6 col-xs-12">
                    <p><a>ponchaadvisor.com</a> /<a> As melhores</a> /  <?php 

            if(isset($_SESSION["status"]))
                    {
                        if($_SESSION["admin"]==1){
                echo '<a href="Ranking.php">Bares</a>';
                    }else{
                      echo '<a href="Ranking.php">Avaliar</a>';}
                    }else{
                        echo '<a href="Ranking.php">Avaliar</a>';}
                        
                    ?> /<a> Mapa</a> /<a> Contactos</a></p>
                </div>
            </div>
        </div>
    </div>
</div>