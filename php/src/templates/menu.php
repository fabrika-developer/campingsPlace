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


error_reporting(1);
$navbar = '
        <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top nav-fill w-100">

            <a class="navbar-brand" href="index.php">
            <img src="../images/logo.png" alt="Fabrika Dev" width="60">
            </a>

            <a class="navbar-brand" href="index.php">  Campings | Place </a>&nbsp;

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                                <li><a class="nav-link" href="balances.php">MENU 2</a></li>
                                <li><a class="nav-link" href="envios.php">MENU 3</a></li>
                                <li><a class="nav-link" href="expediciones.php">MENU 4</a></li>
                                <li><a class="nav-link" href="pagos.php">MENU 5</a></li>
                                <li><a class="nav-link" href="comisiones.php">MENU 6</a></li>
                                <li><a class="nav-link" href="pagos_celit.php">MENU 7</a></li>
                                <li><a class="nav-link" href="metodos_pago.php">MENU 8</a></li>
                                <li><a class="nav-link" href="reportes.php">MENU 9</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tools
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="nav-link" href="search_error.php">Tool 1</a></li>
                                <li><a class="nav-link" href="import_and_resolve_csv.php">Tool 2</a></li>
                                <li><a class="nav-link" href="import_csv.php">Tool 3</a></li>
                                <li><a class="nav-link" href="resolve.php">Tool 4</a></li>
                                <li><a class="nav-link" href="solucionados.php">Tool 5</a></li>
                            </ul>
                        </li>                                
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        ';

                        if(!ISSET($_COOKIE['hola'])){

                            $navbar .= '<li><a class="nav-link" href="login.php">Login</a></li>';

                        }else{

                            $navbar .= '
                            <li><a class="nav-link" href="logout.php">Logout </a></li>';
                            $navbar .= '<li><a class="nav-link" href="logout.php">'. $htmlHome .'</a></li>';
                        };
                        
$navbar .= '
                    
                        
                    </ul>
                    </div>

        </nav>

        
    <div class = "container container-fluid">




';