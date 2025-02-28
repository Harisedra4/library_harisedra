<?php
  require "connexion.php";
  $bdd =connexion_bdd();
  
  function get_articles(){
    global $bdd;
    $article = $bdd->query("SELECT * FROM livres ");
    return $article->fetchAll();
  }
  
  function get_categorie(){
    global $bdd;
    $categorie = $bdd->query("SELECT DISTINCT(categories) FROM livres");
    return $categorie->fetchAll();
    
  }
  function filter(){
    global $bdd;
    $categories = $_GET["category"];
    $filter_categorie = $bdd->prepare("SELECT * FROM livres WHERE categories = ?");
    $filter_categorie->execute(
        [$categories]
    );
    return $filter_categorie->fetchAll();

  }
  function description_livre(){
    global $bdd;
    $id_article = intval($_POST["add_description"]);
    $article_isset = $bdd->prepare("SELECT * FROM livres WHERE id = ?");
    $article_isset->execute(
      [$id_article]
    );
    return $article_isset->fetch();
  }
  function search(){
    global $bdd;
    $inputSearch = htmlspecialchars($_POST["inputSearch"]);
    if(isset($_GET["category"])){
      $get_category = $_GET["category"];
      $book_search= $bdd->prepare("SELECT * FROM livres WHERE titre LIKE ? AND categories = ?");
      $book_search->execute([
        "%".$inputSearch."%",
        $get_category
      ]);


    }else{
      $book_search = $bdd->prepare("SELECT * FROM livres WHERE titre LIKE ?");
      $book_search->execute(
        ["%".$inputSearch."%"]
      );
    }
    return $book_search->fetchAll();
  }
 
  function signin(){
  global $bdd;
  $inputName = htmlspecialchars($_POST["inputName"]);
  $inputLastName = htmlspecialchars($_POST["inputLastName"]);
  $inputDate = htmlspecialchars($_POST["inputDate"]);
  $inputMail = htmlspecialchars($_POST["inputMail"]);
  $inputFile = upload_file($_FILES["inputFile"]);
  $status = null;
  $inputPassword = htmlspecialchars($_POST["inputPassword"]);
  $inputConfirme = htmlspecialchars($_POST["inputConfirme"]);
  $user =$bdd->prepare("SELECT * FROM library_userrs WHERE e_mail = ?");
  $user->execute([$inputMail]);
  $res_users = $user->rowCount();
  if($res_users == 0){
    if($inputPassword == $inputConfirme){
      $insert = $bdd->prepare("INSERT INTO library_userrs(nom,prenom,date_de_naissance,e_mail,photo,password) VALUES(?,?,?,?,?,?)");
      $insert->execute([
        $inputName,
        $inputLastName,
        $inputDate,
        $inputMail,
        $inputFile,
        $inputPassword
      ]);
      $status = "inscription terminé";
    }else{
      $status = "veuillez réessayer :mot de passe non confirmé!";
    }
  }else{
    $status = "utilisateur existe déjà";
  }
  return $status;

  }
  function upload_file($file){
    global $inputPassword;
    global $inputConfirme;
    $rand1 = rand(100000,100000000000);
    $rand2 = rand(3000000,700000000);
    $rand = rand($rand1, $rand2);
    // echo $rand;
    $extension = explode("/",$file["type"])[1];
    // var_dump($extension);
    $file_name = $rand.".".$extension;
    // echo $file_name;
    if($_SERVER["REQUEST_URI"] =="/" || $_SERVER["REQUEST_URI"] =="/index.php"){
        $path = "images/roman d'amour/";

    }else{
        $path = "../images/roman d'amour/";
    }
    // move_uploaded_file($file["tmp_name"],"../images/$file_name");
    // var_dump($file);
    if($inputPassword !== $inputConfirme){
      move_uploaded_file($file["tmp_name"],$path.$file_name);

    }
    return $file_name;
}
function login(){
  global $bdd;
  $emailLogin = htmlspecialchars($_POST["emailLogin"]);
  $passwordLogin = htmlspecialchars($_POST["passwordLogin"]);
  $status_login = null;
  $find_users = $bdd->prepare("SELECT * FROM library_userrs WHERE e_mail = ?");
  $find_users->execute([$emailLogin]);
  $count_user = $find_users->rowCount();
  if($count_user == 1){
     $user = $find_users->fetch();
     if($user["password"] == $passwordLogin){
      $_SESSION["auth"] = [
        "id"=>$user["id"],
        "nom"=>$user["nom"],
        "prenom"=>$user["prenom"],
        "date_de_naissance"=>$user["date_de_naissance"],
        "e_mail"=>$user["e_mail"],
        "photo"=>$user["photo"] 
      ];
      $status_login = "connecté!";
      // header("Location:/");
    }else{
       $status_login = "mot de passe incorrect!";
     }
  }else{
    $status_login = "E-mail incorrect!";
  }
  return $status_login;
}
?>