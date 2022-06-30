<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

$load = new queryes_crud;

$selectCampingByCountry = $load->selectAllDataFromTable('DISTINCT addressDepartement', 'campings_general_data_use', '', 'addressDepartement');
foreach ($selectCampingByCountry as $key => $datoscp){
    echo '<pre>';
    print_r(strtoupper($datoscp['addressDepartement']));
}