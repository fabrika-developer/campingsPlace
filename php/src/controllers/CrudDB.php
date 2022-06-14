<?php
require_once('../config/ConnectionDB.php');

// Select Data Query
function select($columns, $from, $where, $order){
    $importClass = new GeneralCrudSr();
    $query = $importClass->selectAllDataFromTable($columns, $from, $where, $order);
    return $query;
}

// Insert Data Query
function insert($table, $values){
    $importClass = new GeneralCrudSr();
    $insert = $importClass->insertDataToTable($table, $values);
}

// Update Data Query
function update($table, $values, $where){
    $importClass = new GeneralCrudSr();
    $update = $importClass->updateDataToTable($table, $values, $where);
}

// Delete Data Query
function delete($table, $where){
    $importClass = new GeneralCrudSr();
    $delete = $importClass->deleteDataToTable($table, $where);
}

// HELP TO USE THIS
// $importClass = new GeneralCrudSr();
// Array Model to Follow
// $valuesInsert = array(
//     'name_user' => '555',
//     'email' => '555',
//     'tele' => '555'
// );
// ---------------