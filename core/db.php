<?php 
	$host = 'localhost';
    $dbname = 'crosscloud';
    $user = 'root';
    $pass = 'root';

    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    try{
        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, $options);
    } catch(Exception $e){
        die('Erreur de connexion à la DB');
    }
?>