
<!-- Aqui é contido o conteudo da pagina principal, uma pequena sinopse e links para diferentes
locais do site assim como o display dos 3 ultimos comentários dos ultimos 15 dias  -->
<div id="context">
<div class="container">
        <div class="row m-spacing">
            <div class="col-md-4 col-sm-6 col-xs-12 footer-main">
                <div class="logo-footer">
                    <img alt="logo poncha advisor" id="logotipo" src="assets/img/logo.png">
                </div>
                <p>Ponchadvisor - porque a poncha não é toda igual. Somos a referência da poncha na Madeira e no Mundo. Com milhares de avaliações estamos certos que vai ficar fâ da melhor poncha do mundo.</p>
                <p>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@ponchaadvisor.com">E-mail : info@ponchaadvisor.com</a>
                </p>
            </div>

            <div class="col-md-2 col-sm-6 col-xs-12">
                <h6 class="heading-footer">General Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#"> Career</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#"> Terms of Use</a></li>
                    <li><a href="#"> Client Gateway</a></li>
                    <li><a href="#"> Ranking</a></li>
                    <li><a href="#"> Case Studies</a></li>
                    <li><a href="#"> Frequently Ask Questions</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <h6 class="heading-footer">Últimas avaliações</h6>
                <div class="post">
                <?php
                // pedido da função que mostra os comentários
                require_once("section/coments.php");

                ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 m-spacing">
                <h6 class="heading-footer">Siga-nos!</h6>
                <div class="social-link">
                    <blockquote cite="https://www.facebook.com/ponchaadvisor">
                        <i class="fa fa-facebook"></i>
                        <a href="https://www.facebook.com/ponchaadvisor" target="_blank">Facebook</a>
                    </blockquote>
                </div>
                <div class="social-link">
                    <blockquote cite="https://www.twitter.com/ponchaadvisor">
                        <i class="fa fa-twitter"></i>
                        <a href="https://www.twitter.com/ponchaadvisor" target="_blank">Twitter</a>
                    </blockquote>
                </div>
                <div class="social-link">
                    <blockquote cite="https://www.instagram.com/ponchaadvisor">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/ponchaadvisor" target="_blank">Instagram</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
