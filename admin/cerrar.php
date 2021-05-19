<?php 
    session_start();

    session_destroy();
    $_SESSION = array(); // reiniciamos el arreglo por seguridad

    header('Location: login.php');
    die();
    
?>