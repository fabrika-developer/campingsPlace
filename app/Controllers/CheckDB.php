<?php
require_once('../Class/DbClasses/ConnectionDB.php');

$importClass = new GeneralCrudSr();

// Select Data Query
    $query = $importClass->selectAllDataFromTable(' * ', ' test ', ' ', ' id ');
    foreach ($query as $key => $value) {
        echo '<pre>';
        // echo $value->id;
        print_r($value);
        echo '</pre>';
    };

// Insert Data Query
    // Prepare data to insert
    $valuesInsert = array(
        'name_user' => '555',
        'email' => '555',
        'tele' => '555'
    );
    // print_r($valuesInsert);
    // call insertDataToTable
    // $insert = $importClass->insertDataToTable('test', $valuesInsert);

// Update Data Query
    // Prepare data to update
    $valuesUpdate = array(
        'name_user' => 'qqqweqw',
        'email' => 'sdfsfsdf',
        'tele' => '2345345'
    );
    // call updateDataToTable
    $update = $importClass->updateDataToTable('test', $valuesUpdate, ' id = 21 ');
    // print_r($update);


// Delete Data Query
    // call deleteDataToTable
    // $delete = $importClass->deleteDataToTable('test', ' id = 20 ');

