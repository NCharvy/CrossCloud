<?php
    require_once("functions.php");
    require_once("db.php");

    $id = null;

    if(isset($_GET)){
        $id = $_GET['id'];
    }
    
    $title = testPost('title', '$title');
    $id_category = testPost('category', '$category');
    $cat = $_POST['category'];
    $rep = repertoire($cat);
    $link = testUp($rep, 'link');

    $sql = "INSERT INTO articles SET title = '$title', link = '$link', id_category = '$id_category'";
    $saved_upload = $bdd->exec($sql);

    if($saved_upload){
        header('Location: ../interface.php');
        exit();
    }
    else{
        echo "Erreur";
    }
    
    