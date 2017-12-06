<?php
    require_once("functions.php");
    require_once("db.php");

    $id = null;

    if(isset($_GET)){
        $id = $_GET['id'];
    }
    
    $title = testPost('title', '$title');
    $id_category = testPost('category', '$category');
	if(isset($_FILES)){
		$cat = $_POST['category'];
		$rep = repertoire($cat);
		$link = testUp($rep, 'link');
		$sql = "UPDATE articles SET link = '$link' WHERE id = '$id'";
		$saved_upload = $bdd->exec($sql);
	}
    $sql = "UPDATE articles SET title = '$title', id_category = '$id_category' WHERE id = '$id'";
    $saved_upload = $bdd->exec($sql);

    if($saved_upload){
        header('Location: ../interface.php');
        exit();
    }
    else{
        echo "Erreur";
    }
    
    