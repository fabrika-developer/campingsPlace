<?php
if (ISSET($_COOKIE['auth']) && $_COOKIE['auth'] == '1') {
    
} else {

    setcookie("auth", "", time() - 3600);
    setcookie("hola", "", time() - 3600);
    header("Location: login.php");
    exit();
}