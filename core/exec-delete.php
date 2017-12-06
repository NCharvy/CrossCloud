<?php
    require_once("db.php");
    require_once("functions.php");
    $id = null;

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        
        $del = deleteFrom('articles', 'id', $id);
        
        if($del){
            header('Location: ../etat.php?status=ok');
        }
        else{
            header('Location: ../base.php?status=err');
        }
    }
    else{
        header('Location: ../etat.php?status=err');
    }
        
        