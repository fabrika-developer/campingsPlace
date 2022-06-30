<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

$load = new queryes_crud;

$selectCampingByCountry = $load->selectAllDataFromTable('*', 'campings_general_data_use', 'WHERE raisonSociale != ""', 'id');
foreach ($selectCampingByCountry as $key => $datoscp){
    echo '<pre>';
    print_r($datoscp);
}