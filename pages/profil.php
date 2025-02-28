<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/profil.css">
        
    </head>
    <body>
    <header>
        <div class="contenuHeader">
            <div class="logo"><h1>BiblioTech</h1></div>
            <div class="conte">
                <a href="../index.php">Home</a>
                <a href="../index.php#sectionAcceuil">Acceul</a>
                <a href="../index.php#sectionService">Nos service</a>
                <a href="../index.php#sectionPropos">A propos</a>
                <a href="../index.php#contact">contact</a>
                <!-- <input type="search" name="" id="" placeholder="rechercher"> -->
            </div>
            <?php
              if(!isset($_SESSION["auth"])): 
            ?>
            <button class="connexionhead">connexion <i class="fa fa-sign-in-alt"></i></button>
            <?php 
             endif;
            ?>
               <?php
              if(isset($_SESSION["auth"])): 
            ?>
            <a href="pages/deconnexion.php" class="deconnexionhead" >deconnexion </a>
            <?php 
             endif;
            ?>
        </div>
    </header>
        <section id="profil">
            <div class="utilisateur">
                    <div class="Apropos">
                        <div class="pdp" id="profilUserConn">
                            <img src="../images/roman d'amour/<?= $_SESSION["auth"]["photo"] ?>" alt="" class="imagepdp">
                        </div>
                        <hr>
                        <h1><?= $_SESSION["auth"]["nom"] ;?></h1>
                        <h2><?= $_SESSION["auth"]["prenom"] ;?></h2>
                        <h3 class="h3merdique">E-mail : </h3>
                        <h3 class="h3merdique"><?= $_SESSION["auth"]["e_mail"] ?></h3>
                        <h3 class="h3merdique">Date de naissance : </h3>
                        <h3 class="h3merdique"><?= $_SESSION["auth"]["date_de_naissance"] ?></h3>

                    </div>
            </div>
        </section>
    </body>
</html>