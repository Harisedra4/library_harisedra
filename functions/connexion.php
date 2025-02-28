<?php 

require __DIR__."/../config/server.php";
    function connexion_bdd(){
        $db_name = DB_NAME;
        $db_host = DB_HOST;
        $db_username =DB_USERNAME;
        $db_password =DB_PASSWORD;
        try{
            $bdd =new PDO("mysql:dbname=$db_name;dbhost==$db_host;","$db_username","$db_password");
            $bdd->exec("SET NAMES utf8mb4");

        }catch(PDOExepton $e){
            die("connexion echoué:".$e->getMessage());
        }
        return $bdd;
    }
?>