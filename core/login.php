<?php
    require_once("db.php");

    date_default_timezone_set('Europe/Paris');

    // Variables qui va récupérer les données du formulaire
    $login = null; 
    $pass = null;
    $logs = null;
    $time = null;
    $ip_user = null;
    $browser = null;

    // On teste si le formulaire a bien été rempli, et on récupère les données grâces aux variables qu'on a initialisé avant
    if($_POST){
        if(isset($_POST['login'])){
            $login = $_POST['login'];
        }
        if(isset($_POST['pass'])){
            $pass = sha1($_POST['pass']);
        }
    }

    // Requête préparée, sert à sécuriser les données
    $sql = "SELECT * FROM admin WHERE login = '$login' AND pass = '$pass'";
    $req = $bdd->query($sql);
    $result = $req->fetch(PDO::FETCH_OBJ);
    
    // On teste si la requête a retourné un résultat avec rowCount, si c'est le cas on redirige vers le back-office
    if(($result->login == $login) && ($result->pass == $pass)){
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['login'] = $login;
        
        $time = date('D - j/m/Y - H:i:s');
        $ip_user = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        if($login == "admin"){
            $logs = fopen("../logs/state.txt", "a");
            fputs($logs, "[$time] $login has connected to the cloud interface - IP Address : $ip_user - Browser : $browser \n");
            fclose($logs);

            header('Location: ../interface.php');
            exit();
        }
    }
    // Sinon, on redirige vers la page de connexion avec un message d'erreur
    else{
        header('Location: ../index.php?error=1');
        exit();
    } 
?>