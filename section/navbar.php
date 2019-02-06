
<!-- Nav bar, se o utilizador tiver numa conta admin passa a ter acesso à edição de utilizadores
e bares; caso contrário se for um utilizador com acesso normal pode postar comentários e avaliações 
aos bares-->
<nav role="navigation" class="custom-navbar navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-logo" href="index.php">
                <img alt="logo" id="logotipo" src="assets/img/logo.png">
            </a>
            <button type="button" data-target="#navbar-collapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav custom-navbar-nav">
                <li><a href="#">AS MELHORES</a></li>
                <?php 
            
            // admin vé os bares para poder gerir e edita-los, o user vê o menu Avaliar para postar
            //comentários e avaliações
            if(isset($_SESSION["status"]))
                    {
                        if($_SESSION["admin"]==1){
                echo '<li><a href="Ranking.php">BARES</a></li>';
                    }else{
                      echo '<li><a href="Ranking.php">AVALIAR</a></li>';}
                    }else{
                        echo '<li><a href="Ranking.php">AVALIAR</a></li>';}

                    ?>
                <li><a href="#">MAPA</a></li>
                <li><a href="#">CONTACTO</a></li>
            </ul>
            
            <ul 
                    <?php

                     if(isset($_SESSION["status"]))
                    {
                        echo "hidden";
                    }
                    ?>  class="nav navbar-nav navbar-right" id="menu-login">
                <li><div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" 
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" onclick=cookielogger() aria-expanded="false">
                        LOGIN
                    </button><?php if(isset($_SESSION["status2"]))
                    {
                        echo "".$_SESSION["status2"]."<br>";
                        unset($_SESSION["status2"]);
                    }
                    ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="action/login.php" method="post">
                        <label>Username</label><input type="text" name="Username" id="Username" value="">
                        <label>Password</label><input type="password" name="Password" id="Password" value="">
                        <input type="checkbox" id="remenber" name="remenber" unchecked><label>Remenber Me</label>
                        <a href="./recovery.php">Esqueceu-se da Password?</a><br>
                        <input type="submit"  class="btn btn-primary" value="Log In">
                        </form>
                    </div>
                    </div></li>
                    <li><button  class="btn btn-secondary" class="nav navbar-nav navbar-right" type="button" onclick="window.location='./Signup.php'">SIGN UP</button></li>
                    
            </ul>
            <?php 
            
            // se houver uma sessão iniciada a opção de login é trocada pelo identificador e pelo log out
            if(isset($_SESSION["status"]))
                    {
                        if($_SESSION["admin"]==1){
                            echo '<ul class="nav navbar-nav"><li><a href="users.php">UTILIZADORES</a></li>
                                   </ul>';
                       }

                        echo '<ul class="nav navbar-nav"><li><a id="session">'.$_SESSION["status"].'</a></li>
                        <li><a href="./action/logout.php">Log Out</a></li>
                        </ul>';
                    }
                    ?>
        </div>
    </div>
</nav>


<!-- <script src="./script/cookiecutter.js"></script> -->