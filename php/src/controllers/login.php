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

        $user = '' ;
        $pass = '' ;
     
        if (ISSET($_POST['user'])) {
            $user = $_POST['user']; 
            // echo "Olá, $user";
        }
        if (ISSET($_POST['pass'])) {
            $pass = $_POST['pass'];
            // echo "Senha: $pass";
        } 
       
        //Cargamos al modelo
            require_once("../models/login.php");
            require_once("../config/bbdd.php");
        //Cargamos a la vista
            require_once("../views/index.php");
            require_once("../views/login.php");


        // Llamamos a las classes
            // Cargamos a la conexione a masterDB
             $masterDB = new Connections();
             $masterDB = $masterDB->masterDB();
            // Cargamos a la conexion a Fabrika DevDB
             $secondaryDB = new Connections();
             $secondaryDB = $secondaryDB->secondaryDB();

            // Cargamos search
             $call = new login($user, $pass, $secondaryDB);
             $data = $call->login($user, $pass, $secondaryDB);
?>