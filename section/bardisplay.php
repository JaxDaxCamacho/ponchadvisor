
<!-- Aqui temos um slider/carroussel de imagens para as imagens associadas a cada bar. O Slider
é de uma library de JS chamada Swiper. -->
<div id="content">
<div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
      echo '<div class="swiper-slide"><img src="assets/img/'.$nomeBar.'.jpg" class="contentimg">
            </div>';
        ?>
       
    </div>
    <!-- Add Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>