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

 require_once("../config/bbdd.php");

 require_once("../controllers/login.php");

 require_once("../templates/html_head.php");

 require_once("../templates/html_login.php");

 require_once("../templates/html_footer.php");

echo $htmlFormLogin;

?>