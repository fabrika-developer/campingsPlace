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

 setcookie("auth", "", time() - 3600);
 setcookie("hola", "", time() - 3600);
 header("Location: login.php");
 exit();