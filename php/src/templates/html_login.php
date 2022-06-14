<?php
/**
 * @version     0.0.1
 * @package     
 * @subpackage  
 * @author      Fabrika Dev <david.snege@gmail.com>
 * @copyright   2021 Fabrika Dev (Campings Place)
 * @license     Licença de uso Somente para Campings Place!
 * 
 **/

if (ISSET($_POST['user'])) {
    $user = $_POST['user']; 
}
if (ISSET($_POST['pass'])) {
    $pass = $_POST['pass'];
} 

$htmlFormLogin = '
<div class="center">
<form class="form-signin" action="login.php" method="post">
<img src="../../../images/logo.svg" alt="Campings Place" width="72"> <br><br>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="user" class="sr-only">Email address</label>
            <input type="user" id="user" name="user" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="user" class="sr-only">Password</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="">
            <input type="hidden" id="Authorization" name="Authorization" class="form-control" >    <br>
    <button class="btn btn-sm btn-dark btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">©fabrikadev</p>
</form>
</div>
';


if (ISSET($_COOKIE['auth']) && $_COOKIE['auth'] == true) {
    header("Location: login.php");
    exit();         
}

if (ISSET($data->name) && ISSET($data->auth)) {
    setcookie("auth", $data->auth, time() + 86400);
    setcookie("hola", $data->name, time() + 86400);
    header("Location: dashboard.php");
    exit();     
}
