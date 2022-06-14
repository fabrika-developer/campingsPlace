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
require_once('../config/ConnectionDB.php');

// Select Data Query
/**
 * @param mixed $columns
 * @param mixed $from
 * @param mixed $where
 * @param mixed $order
 * 
 * @return [type]
 */
function select($columns, $from, $where, $order){
    $importClass = new GeneralCrudSr();
    $query = $importClass->selectAllDataFromTable($columns, $from, $where, $order);
    return $query;
}

// Insert Data Query
/**
 * @param mixed $table
 * @param mixed $values
 * 
 * @return [type]
 */
function insert($table, $values){
    $importClass = new GeneralCrudSr();
    $insert = $importClass->insertDataToTable($table, $values);
}

// Update Data Query
/**
 * @param mixed $table
 * @param mixed $values
 * @param mixed $where
 * 
 * @return [type]
 */
function update($table, $values, $where){
    $importClass = new GeneralCrudSr();
    $update = $importClass->updateDataToTable($table, $values, $where);
}

// Delete Data Query
/**
 * @param mixed $table
 * @param mixed $where
 * 
 * @return [type]
 */
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