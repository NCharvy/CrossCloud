<?php
	session_start();
	require_once("core/db.php");
	$login = $_SESSION['login'];
	
    if(!isset($_SESSION['logged']) || ($_SESSION['logged'] !== true)){
        header('Location: index.php');
        exit();
    }
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf8" />
		<title>Xover | Cloud</title>
		<meta name="description" content="Cloud destiné à une utilisation privée de la part du staff de Xover" />
		<link type="text/css" rel="stylesheet" href="assets/css/styles.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="assets/font-awesome-4.3.0/fa/css/font-awesome.min.css" media="screen" />
	</head>
	<body>
		<header id="head-inside">
			<div class="cont-headb clearfix">
                <span id="block-left" style="color : #eee;">Bienvenue, <span style="color : red;"><?php echo $login; ?></span></span>
                <a id="block-right" href="core/unlog.php"><b>X</b> Deconnexion</a>
            </div>
		</header>