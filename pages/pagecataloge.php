<?php
session_start();
 require "../functions/function.php";
 if(isset($_POST["inputSearch"])){
    $get_articles = search();
 }else{
     $get_articles = get_articles(); 
    
 }
 if(isset($_POST["buttonLogin"])){
    $status_login = login();
  }
  if(isset($_POST["buttonTerminer"])):
    $status = signin();
 
?>
 <?php
     endif; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylecatalogue.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
</head>
<body>
<?php
     if (isset($_POST["buttonTerminer"])):
    ?>
    <div class="status" id="status">
    <form action=""><button id="buttonEscape"><i class="fa fa-times" id="fa-times2"></button></i></form>
        <h3><?= $status ?></h3>
    </div>
    <?php
    endif; 
    ?>
        <?php
     if (isset($_POST["buttonLogin"])):
    ?>
    <div class="status" id="status">
    <form action=""><button id="buttonEscape"><i class="fa fa-times" id="fa-times2"></button></i></form>
        <h3><?= $status_login ?></h3>
    </div>
    <?php
    endif; 
    ?>
    <header>
        <div class="contenuHeader">
            <div class="logo"><h1>BiblioTech</h1></div>
            <nav class="conte">
                <a href="../index.php">Home</a>
                <a href="../index.php#sectionAcceuil">Acceul</a>
                <a href="../index.php#sectionService">Nos service</a>
                <a href="../index.php#sectionPropos">A propos</a>
                <a href="../index.php#contact">contact</a>
                <form action="" class="formreserch" method="POST">
                    <input type="search"id="" placeholder="rechercher" name="inputSearch">
                    <div ><button class="btnresee"><i class="fa fa-search"></i></button></div>
                </form>
            </nav>
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
            <a href="deconnexion.php" class="deconnexionhead" >deconnexion </a>
            <?php 
             endif;
            ?>
            
            <div class="connexion">
            
                <span class="conect">Se connecter</span>
                <p>Nouveau sur ce site ? <button class="btninscription" id="btninscription">S'inscrire</button></p>
                <form action="">
                    <label for="email">E-mail</label><br>
                    <input class="formel" type="email" id="email" placeholder="E-mail"><br>
                    <label for="motDePasse"> Mot de passe</label><br>
                    <input class="formel" type="password" name="" id="motDePasse" placeholder="Mot de passe"><br>
                    <button class="seconnect">connecter</button>
                </form>
            </div>
            <div class="inscriptionUser" id="inscriptionUser">
                <h1>inscrivez-vous maintenant!</h1>
                <i class="fa fa-times" id="fa-times"></i>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="inputName">Nom:</label>
                    <br>
                    <input type="text" id="inputName" name="inputName" placeholder="votre Nom"><br>
                    <label for="inptLastName">Prenom:</label><br>
                    <input type="text" id="inptLastName" name="inputLastName" placeholder="votre prenom"><br>
                    <label for="inputDAte">Date de naissance:</label><br>
                    <input type="date" name="inputDate" id="inputDAte"><br>
                    <label for="inputMail">Votre E-mail :</label><br>
                    <input type="email" name="inputMail" id="inputMail" placeholder="e-mail..."><br>
                    <label for="inputFile">Photo: <br> <i class="fa fa-user-plus"></i></label>
                    <input type="file" name="inputFile" id="inputFile" hidden><br>
                    <label for="inputPassword">Votre mot de passe</label><br>
                    <input type="password" name="inputPassword" id="inputPassword" placeholder="mot de passe"><br>
                    <label for="inputConfirme">Confirmation</label><br>
                    <input type="password" id="inputConfirme" name="inputConfirme" placeholder="Confirmer votre mot de passe"><br>
                    <button id="buttonTerminer" name="buttonTerminer">terminer</button>
                </form>
                </div>
        </div>
    </header>
    <section id="sectionAcceuil">
        <div class="categories">
            <!-- <a href=""><i class="fa fa-book"></i>categories</a> -->
            <a href="librairies.php"><i class="fa fa-book-open"></i>mon librairie</a>
            <a href="livreaudio.php"><i class="fa fa-headphones"></i>livre audio</a>
            <a href="preferance.php"><i class="fa fa-heart"></i>favoris</a>
            <a href="telechargement.php"><i class="fa fa-file-download"></i>Telechargement</a>
            <hr>
            <a href=""><i class="fa fa-comments"></i>Nous soutenir</a>
            <a href="ajouttlivre.php"><i class="fa fa-book"></i>Ajouté livre</a>
            <?php 
             if(isset($_SESSION["auth"])):
            ?>

            <div class="profilConnect">
                <h4>connecté <i class="fa fa-check-circle"></i></h4>
                <p><?= $_SESSION["auth"]["prenom"]; ?></p>
                <img src="../images/roman d'amour/<?= $_SESSION["auth"]["photo"];?>" alt="">
                <a href="profil.php" id="profilUserConnect">profil</a>
            </div>
            <?php
             endif; 
            ?>

        </div>
        <!-- <div class="grandTitre">
            <h1>L'Abîme des livres.</h1>
            <div class="paragraphe">
                <p><span>L'Abîme des livres </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum modi voluptate cumque! Laudantium ab, optio cupiditate corporis a laboriosam reiciendis laborum modi sint consequuntur facilis tenetur aspernatur vel ad adipisci? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt id alias expedita sequi iusto reprehenderit qui? Nemo magnam tenetur vel accusantium animi laboriosam nulla, dicta doloremque itaque! Dolores, minima eaque?</p>
                <p>Elargissez vos horizons une page ala fois. inscrivez-vous dès maintenant et acceder  à une collection riche et variée</p>
            </div>
                <a href="" class="inscription">S'inscrire</a>
        </div> -->
        <div class="cataloge">
           
            <div class="livre">
               <?php 
                foreach ($get_articles as $live):
               ?>
                <div class="book book_cataloge">
                    <form method="POST">
                        <div class="poster_img">
                    <img src ="../images/roman d'amour/<?= $live["photo"] ?>" alt="" class="poster">
                    </div>
                    <h6><?= $live["titre"] ?></h6>
                    <button id="buttonCaché" id="add_description" name="add_description" value="<?= $live["id"] ?>" >Afficher</button>
                    </form>
                </div>
                <?php
                endforeach; 
                ?>
            </div>

        </div>
        <!-- <div class="cataloge categorie"> -->
            <!-- <div class="boutonrecom">
                <h6>categories</h6>
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="liencateg">
                <a href="">All</a>
                <a href="">Sci-fi</a>
                <a href="">Fantasy</a>
                <a href="">drame</a>
ç ta                <a href="">business</a>
                <a href="">education</a>
                <a href="">geographie</a> -->
            <!-- </div> -->php      </div>
        </div>
        <?php
             if(isset($_POST["add_description"])): 
            ?>
            <?php 
               $description_livre = description_livre();
            ?>
        <div class="resume">
            <div class="postere">
                <img src="../images/roman d'amour/<?= $description_livre["photo"] ?>" alt="">
            </div>
            <h2><?= $description_livre["titre"] ?></h2>
            <p>LINE DUBIEF</p>
            <div>
                <P><?= $description_livre["pages"] ?></P>
                <P>pages</P>
            </div>
            <div class="resumelivre">
                <p><?= $description_livre["descripton"] ?></p>
            </div>
            <p class="prix">
            $<?= $description_livre["prix"] ?>
            </p>

        </div>
            <?php 
             endif;
            ?>
    </section>
    <footer>
        <p>hanjaelidina@gmail.com</p>
    </footer>
    <script>
        const livre =document.querySelector(".livre")
        livre.addEventListener("mouseover",()=>{
            livre.style.overflowY = "scroll"
        })
        livre.addEventListener("mouseout",()=>{
            livre.style.overflowY = "hidden"
        })
    </script>
    <script src="../js/script.js"></script>
</body>
</html>