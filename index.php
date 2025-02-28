<?php
session_start(); 
require "functions/function.php";
  $get_category = get_categorie();
  if(isset($_POST["inputSearch"])){
  $get_articles = search();  
  }else if(isset($_GET["category"])){
      $get_articles = filter();
      
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inscription.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
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
                <a href="index.php">Home</a>
                <a href="#sectionAcceuil">Acceul</a>
                <a href="#sectionService">Nos service</a>
                <a href="#sectionPropos">A propos</a>
                <a href="#contact">contact</a>
                <form action="" class="formreserch" method="POST">
                    <input type="search" id="" placeholder="rechercher" name="inputSearch">
                    <div ><button name="inputSerch" class="btnresee"><i class="fa fa-search"></i></button></div>
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
            <a href="pages/deconnexion.php" class="deconnexionhead" >deconnexion </a>
            <?php 
             endif;
            ?>
            
            
            <div class="connexion">
            
                <span class="conect">connecter</span>
                <p>Nouveau sur ce site ? <button class="btninscription" id="btninscription">S'inscrire</button></p>
                <form action="" method="POST">
                    <label for="email">E-mail</label><br>
                    <input class="formel" type="email" name="emailLogin" id="email" placeholder="E-mail"><br>
                    <label for="motDePasse"> Mot de passe</label><br>
                    <input class="formel" type="password" name="passwordLogin" id="motDePasse" placeholder="Mot de passe"><br>
                    <button class="seconnect" name="buttonLogin">connecter</button>
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

            <!-- <div class="creercompte">
                <span class="conect">S'inscrire</span>
                <div class="formulaireinscrit">
                    <form action="">
                        <label for="nom2">Nom :</label><br>
                        <input class="a12a" type="text" id="nom2" placeholder="votre nom de famille"><br>
                        <label for="prenom2">Prenom :</label><br>
                        <input class="a12a" type="text" placeholder="On vous appel comment"><br>
                        <label for="sexe">Sexe :</label><br>
                        <input type="checkbox" name="" id="homme">
                        <label for="homme">Homme</label><br>
                        <input type="checkbox" name="" id="femme">
                        <label for="femme">Femme</label><br>
                        <label for="naissance"> date de naissance</label><br>
                        <input type="date" name="" id=""><br>
                        <label for="profession">Profession :</label><br>
                        <input class="a12a" type="text" placeholder="Si etudiant classe/filière"><br>
                        <label for="ecole">Si etudiant :</label><br>
                        <input  class="a12a" type="text" placeholder="Ecole/Université/centre de formation"><br>
                        <button class="suivant connexionhead">suivant</button>
                    </form>
                </div>
                <div class="emformulaire">
                    <form action="">
                        <label for="email">E-mail :</label><br>
                        <input class="a12a"type="email" name="" id="email" placeholder="votre mail"><br>
                        <label for="password">Mot de passe :</label><br>
                        <input class="a12a"type="password" name="" id="password" placeholder="votre mot de passe"><br>
                        <label for="confirme">Confirmé votre  mot de passe :</label>
                        <input class="a12a"type="password" name="" id="confirme" placeholder="confirmé mot de passe"><br>
                        <label for="identiter">Nous fournire une piece d'idantité avec photo:</label><br>
                        <input  class="a12a" type="file" name="" id="identiter"><br>
                        <label for="photo">Photo pour confirmé :</label><br>
                        <input  class="a12a" type="file" name="" id="photo">
                        <button class="confirme connexionhead">S'inscrire</button>
                    </form>
                </div>
            </div> -->

        </div>
    </header>
    <section id="sectionAcceuil">
        <div class="categories">
            <!-- <a href=""><i class="fa fa-book"></i>categories</a> -->
             <a href="pages/pagecataloge.php"> <i class="fa fa-book"></i>cataloge</a>
            <!-- <a href="pages/librairies.html"><i class="fa fa-book-open"></i>mon librairie</a> -->
            <!-- <a href="pages/livreaudio.html"><i class="fa fa-headphones"></i>livre audio</a> -->
            <a href="pages/preferance.php"><i class="fa fa-heart"></i>favoris</a>
            <!-- <a href="pages/telechargement.html"><i class="fa fa-file-download"></i>Telechargement</a> -->
            <hr>
            <a href=""><i class="fa fa-comments"></i>Nous soutenir</a>
            <!-- <a href=""><i class="fa fa-user"></i>connecter</a> -->
            <?php 
             if(isset($_SESSION["auth"])):
            ?>

            <div class="profilConnect">
                <h4>connecté <i class="fa fa-check-circle"></i></h4>
                <p><?= $_SESSION["auth"]["prenom"]; ?></p>
                <img src="images/roman d'amour/<?= $_SESSION["auth"]["photo"];?>" alt="">
                <a href="pages/profil.php" id="profilUserConnect">profil</a>
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
            <div class="boutonrecom">
                <h6>recomandé</h6>
                <a href="pages/pagecataloge.php">voir plus</a>
            </div>
            <div id="boiteLivre">
            <div class="livre">
               <?php 
                foreach ($get_articles as $live):
               ?>
                <div class="book">
                    <form method="POST">
                        <div class="poster_img">
                    <img src ="images/roman d'amour/<?= $live["photo"] ?>" alt="" class="poster">
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
        </div>
        <div class="cataloge categorie">
            <div class="boutonrecom">
                <h6>categories</h6>
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="liencateg">
                <a href="/">All</a>
                <?php 
                 foreach($get_category as $getcat):
                ?>
                <a href="?category=<?= $getcat["categories"]?>"><?= $getcat["categories"] ?></a>
                <?php 
                endforeach;
                ?>
            </div>
            <div id="boiteLivre">
            <div class="livre" >
            <?php 
                foreach ($get_articles as $live):
               ?>
                <div class="book">
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
        </div>
            <?php
             if(isset($_POST["add_description"])): 
            ?>
            <?php 
               $description_livre = description_livre();
            ?>
        <div class="resume">
            <div class="postere">
                <img src="images/roman d'amour/<?= $description_livre["photo"] ?>" alt="">
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
            <p class="prix">prix :$<?= $description_livre["prix"] ?>
            </p>

        </div>
            <?php 
             endif;
            ?>
    </section>
    <section id="sectionService">
        <h5>nos service</h5>
        <div class="service">
            <img src="images/service/e-book-digital-magazine-collection-publishment-download-graphic.jpg" alt="" class="imgService">
            <h2>Accès a des ressources numériques.</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, ea a! Ex vel laboriosam iste dicta deserunt ut praesentium est, accusamus voluptate, obcaecati voluptatibus alias, minima consequuntur temporibus maxime unde.</p>
            <a href="" class="btnservice">voir plus</a>
        </div>

        <div class="service">
            <img src="images/service/young-librarian-organising-books.jpg" alt="" class="imgService">
            <h2>Amprunt de livre.</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, ea a! Ex vel laboriosam iste dicta deserunt ut praesentium est, accusamus voluptate, obcaecati voluptatibus alias, minima consequuntur temporibus maxime unde.</p>
            <a href="" class="btnservice">voir plus</a>
        </div>

        <div class="service">
            <img src="images/service/jeunes-militants-passent-action_23-2149502783.jpg" alt="" class="imgService">
            <h2>Animations et évènements culturels.</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, ea a! Ex vel laboriosam iste dicta deserunt ut praesentium est, accusamus voluptate, obcaecati voluptatibus alias, minima consequuntur temporibus maxime unde.</p>
            <a href="" class="btnservice">voir plus</a>
        </div>

        <div class="service">
            <img src="images/service/etudiants-bibliotheque_144627-20107.jpg" alt="" class="imgService">
            <h2>Services personnalisés.</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, ea a! Ex vel laboriosam iste dicta deserunt ut praesentium est, accusamus voluptate, obcaecati voluptatibus alias, minima consequuntur temporibus maxime unde.</p>
            <a href="" class="btnservice">voir plus</a>
        </div>
    </section>
    <section id="sectionPropos">
        <h5 class="proposnous">a propos de Nous </h5>
        <div class="propos">
            <h3>Un accès gratuit à la <br>connaissance:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, culpa!</p>
        </div>
        <div class="propos">
            <h3>Un espace de découverte:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, culpa!</p>
        </div>
        <div class="propos">
            <h3>Un lieu de rencontre <br> et d'echange:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, culpa!</p>
        </div>
        <div class="propos">
            <h3>Un outil pour l'apprentissage <br> tout au long de la vie:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, culpa!</p>
        </div>
        <div class="propos">
            <h3>Un accès gratuit à la connaissance:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, culpa!</p>
        </div>
        
    </section>
    <section id="contact">
        <h5>nos contact</h5>
        <div class="lescontact">
            <h2 class="contact">Contactez-nous par:</h2>
                <div class="boitecontact b1">
                        <i class="fa fa-phone"></i>
                        <h4>Téléphone</h4>
                        <p>+261 34 00 000 01</p>
                </div> 
                <div class="boitecontact b2">
                    <i class="fa fa-envelope"></i>
                    <h4>E-mail</h4>
                    <p>+261 34 00 000 01</p>
                </div>
                <div class="boitecontact b3">
                    <i class="fa fa-map-marker-alt "></i>
                    <h4>Localisation</h4>
                    <p>+261 34 00 000 01</p>
                </div>
                <div class="boitecontact b4">
                    <i class="fa fa-clock"></i>
                    <h4>Horaire</h4>
                    <p>+261 34 00 000 01</p>
                </div>
        </div>
        <div class="lescontact">
            <h2 class="contact">Nous ecrire:</h2>
            <form action="">
                <input type="text" placeholder="Nom:">
                <input type="text" placeholder="Prenom:"><br>
                <input type="number" name="" id="" placeholder="téléphone:">
                <input type="email" name="" id="" placeholder="email:">
                <textarea name="" id=""></textarea><br>
                <button>Envoyer</button>
            </form>
            </div>
    </section>
    <footer>
        <p>hanjaelidina@gmail.com</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>