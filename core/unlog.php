<?php
    session_start();

    date_default_timezone_set('Europe/Paris');

    $time = date('D - j/m/Y - H:i:s');
    $login = $_SESSION['login'];

    $logs = fopen("../logs/state.txt", "a");
    fputs($logs, "[$time] $login has been unlogged from the system. Returning to anonymous restrictions. \n");
    fclose($logs);

    unset($_SESSION['logged']);

    header('Location: ../index.php');
    exit();
?>