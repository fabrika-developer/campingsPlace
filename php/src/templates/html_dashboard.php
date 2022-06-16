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

// Carga del la classe de CrudDB
require_once('../controllers/crud.php');

// Tabela de lo select
echo '<table class="table">';
echo '    <thead>';
echo '        <tr>';
echo '        <th scope="col"> ID </th>';
echo '        <th scope="col"> User </th>';
echo '        <th scope="col"> Email </th>';
echo '        <th scope="col"> Roll </th>';
echo '        </tr>';
echo '    </thead>';

// _id 	username 	password 	usermail 	userroll 	datechange 	
$consulta = select('*', 'user_class_admin', '', '_id');

foreach ($consulta as $key => $datos) {
    //  table user_class_admin
    echo '    <tbody>';
    echo '        <tr>';
    echo '        <th scope="row">'.$datos['_id'].'</th>';
    echo '        <th scope="row">'.$datos['username'].'</th>';
    echo '        <th scope="row">'.$datos['usermail'].'</th>';
    echo '        <th scope="row">'.$datos['userroll'].'</th>';
    echo '        </tr>';
    echo '    </tbody>';
}
echo '</table>';

// Selecionando cosas de um camping del inicio al fin

// seleciono el camping por region, departamento, ciudad o pais
$selectCampingByCountry = select('*', 'campings_general_data', 'WHERE camping_country_id = 1', '_id');

foreach ($selectCampingByCountry as $key => $datos){
    $datos['camping_description_large'] = utf8_encode($datos['camping_description_large']);
    print_r($datos);

    echo '</p>';

    $selectAvailabilityByCamping = select('*','places_campings_availability', 'WHERE availability_id = 1', '_id');
    foreach ($selectAvailabilityByCamping as $key => $datos){
        print_r($datos);

        echo '</p>';

        $thingsPlacesAvailability = select('*', 'things_places_availability', 'WHERE things_id = 1', '_id');
        foreach ($thingsPlacesAvailability as $key => $datos){
            print_r($datos);
        }

    }




}
echo '</p>';





$places_campings_availability = select('*', 'places_campings_availability', 'WHERE availability_id = 01', '_id');
foreach ($places_campings_availability as $key => $datos){
    print_r($datos);
}

// --- Fim ---

// $htmlFormLogin = '
// <h2>
// My DashBoard
// </h2>';



