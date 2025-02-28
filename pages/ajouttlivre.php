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
    <link rel="stylesheet" href="../css/ajoutlivre.css">
</head>
<body>
    <header>
        <div class="contenuHeader">
            <div class="logo"><h1>BiblioTech</h1></div>
            <nav class="conte">
                <a href="../index.php">Home</a>
                <a href="../index.php#sectionAcceuil">Acceul</a>
                <a href="../index.php#sectionService">Nos service</a>
                <a href="../index.php#sectionPropos">A propos</a>
                <a href="../index.php#contact">contact</a>
                <form action="" class="formreserch">
                    <!-- <input type="search" name="" id="" placeholder="rechercher"> -->
                    <!-- <div ><button class="btnresee"><i class="fa fa-search"></i></button></div> -->
                </form>
            </nav>
            <!-- <a href="" class="connexionhead">connexion</a> -->
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
    <section id="ajoutlivre">
        <div class="ajouter">
            <h2>Publié mon livre</h2>
            <form action="">

                <div>
                    <input type="text" placeholder="titre de votre livre">
                    <input type="number" name="" id="" placeholder="nombre de page">
                </div>
                <div>
                    <textarea name="" id="resumelivre" placeholder="petit resumé de votre livre"></textarea>
                </div>
                <img src="../images/book-computer-file-books-a6c24512ee06817cfb9de9b70fbe1acd.png" alt="">
                <div>
                    <input type="text" placeholder="Nom de l'auteur">
                </div>
                <p>Poster</p>
                <div>
                    <input type="file" name="" id="poster">
                </div>
                <div class="option">
                <div class="prix">
                    <label for="gratuit">Gratuit</label>
                    <input type="checkbox" name="" id="gratuit">
                </div>
                    <div class="prix">
                        <label for="Payant">Payant</label>
                        <input type="checkbox" name="" id="Payant">
                    </div>
                    
                    <div class="prix">
                        <label for="gratuit">Telechargable</label>
                        <input type="checkbox" name="" id="gratuit">
                    </div>
                    <div class="prix">
                        <label for="Payant">A recupére </label>
                        <input type="checkbox" name="" id="Payant">
                    </div>
                </div>
                <input type="number" name="" id="prix" value="100">
                <p class="dolar">$</p>
                <button class="publier">Publier</button>
            </form>
        </div>
    </section>
</body>
</html>