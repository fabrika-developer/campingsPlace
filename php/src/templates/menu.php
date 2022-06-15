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


error_reporting(0);

    $navbarLogout = '
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top nav-fill w-100">
        <a class="navbar-brand" href="login.php">
        <img src="../images/logo.png" alt="Fabrika Dev" width="60">
        </a>
        <a class="navbar-brand" href="login.php">  Campings | Place </a>&nbsp;
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                </ul>
                </div>
    </nav>
    <div class = "container container-fluid">
    ';

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
                                    <li><a class="nav-link" href="balances.php">Habitaciones</a></li>
                                    <li><a class="nav-link" href="envios.php">Promociones</a></li>
                                    <li><a class="nav-link" href="expediciones.php">Reservados</a></li>
                                    <li><a class="nav-link" href="pagos.php">Clientes</a></li>
                                    <li><a class="nav-link" href="comisiones.php">Datos</a></li>
                                    <li><a class="nav-link" href="pagos_celit.php">Plugins</a></li>
                                    
                                    <li><a class="nav-link" href="reportes.php">Reportes</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tools
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="nav-link" href="search_error.php">Subir Habitaciones</a></li>
                                    <li><a class="nav-link" href="import_and_resolve_csv.php">Subir Promociones</a></li>
                                    <li><a class="nav-link" href="import_csv.php">Gestionar Medias</a></li>
                                    <li><a class="nav-link" href="resolve.php">Gestionar SEO</a></li>
                                    <li><a class="nav-link" href="solucionados.php">Gestionar Traducciones</a></li>
                                    <li><a class="nav-link" href="solucionados.php">Gestionar Condiciones</a></li>
                                    <li><a class="nav-link" href="solucionados.php">Gestionar My Home</a></li>
                                    <li><a class="nav-link" href="solucionados.php">Gestionar Mailings</a></li>
                                    <li><a class="nav-link" href="solucionados.php">Gestionar Re-MKT</a></li>
                                    <li><a class="nav-link" href="metodos_pago.php">Pedir Soporte</a></li>
                                    <li><a class="nav-link" href="metodos_pago.php">Cambiar mi Plan</a></li>
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
        <div class = "container container-fluid">';
