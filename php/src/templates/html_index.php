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
if(ISSET($_COOKIE['hola'])){
    $htmlHome = '
    <p> Bienvenido '.$_COOKIE['hola'].'</p>';
}else{
        $htmlHome = '';
    }