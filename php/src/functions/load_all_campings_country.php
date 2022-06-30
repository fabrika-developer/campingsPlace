<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

$load = new queryes_crud;

$selectCampingByCountry = $load->selectAllDataFromTable('raisonSociale, addressCountry, addressRegion, addressDepartement, coordLatitude, coordLongitud', 'campings_general_data_use', '', 'id');
foreach ($selectCampingByCountry as $key => $datoscp){
    echo '<pre>';
    $datoscp['raisonSociale'] = utf8_encode(strtoupper($datoscp['raisonSociale']));
    print_r($datoscp);
}