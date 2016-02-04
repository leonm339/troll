<?php
    session_start();
    
    if (!isset($_SESSION['user_id']) && 
            $_SERVER['REQUEST_URI'] != '/troll/login.php' && 
            $_SERVER['REQUEST_URI'] != '/troll/registration.php' && 
            $_SERVER['REQUEST_URI'] != '/troll/signin.php') {
        header("Location: login.php");
    }
?>