<?php
if (ISSET($_SESSION["auth"]) && $_SESSION['auth'] == '2') {
    
} else {
    $verified = '';
    unset($_SESSION["auth"]); 
    unset($_SESSION["hola"]); 
    header("Location: login.php");
    exit();
}