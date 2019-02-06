
    <!-- Aqui é colocado o formulário para a avaliação/comentário de um bar. Recebe um ficheiro como anexo 
    e estes são ligados através da base de dados.-->
<div id="avaliar" class="container" class="d-flex justify-content-center">
    <div id="barOnReview">
    <form class="review" action="action/review-action.php" method="post" enctype="multipart/form-data">
        <h4>Fotografias</h4>
            <input type="file" name="image" accept="assets/img/*" onchange="preview_image(event)">
            <img id="output_image"/>

            
    </div>

    <div id="reviewing">
            <h4>A sua avaliação geral para este bar</h4>
            <div class="rating">
                            <input type="radio" id="star5" name="stars" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="stars" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="stars" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="stars" value="3.5" /><label class="half" for="star3half" title="Goodish - 3.5 stars"></label>
                            <input type="radio" id="star3" name="stars" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="stars" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="stars" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="stars" value="1.5" /><label class="half" for="star1half" title="very bad - 1.5 stars"></label>
                            <input type="radio" id="star1" name="stars" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="stars" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </div>
    <br><br>
    <div class="description" class="form-group" class="container" class="d-flex justify-content-center">
            <input  type="hidden" name="nome_bar" value="<?php echo $nomeBar?>" >
            <h4>Título da sua avaliação</h4>
            <input type="text" class="form-control" placeholder="Resumo da sua experiência" value="<?php if(isset($_SESSION["title"])) { echo htmlspecialchars($_SESSION["title"]); } ?>" id="title" name="title">
            <h4>A sua avaliação</h4>
            <textarea rows="4" cols="50"  placeholder="Conte aos outros a sua experiência: descreva o lugar ou a atividade, recomendações para viajantes?" required maxlength="500" name="eval" >
            <?php
             if(isset($_SESSION["eval"])) { echo htmlspecialchars($_SESSION["eval"]); } 
             ?></textarea>
            
            <h4>Data de Visita</h4>
            <input type="date" name="date" max=<?php echo date("Y-m-d")?>>
            <input type="submit" class="btn btn-outline-warning" value="Enviar avaliação">
        </form>
    </div>
</div>
</div>