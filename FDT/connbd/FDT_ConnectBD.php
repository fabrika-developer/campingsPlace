<?php
/**
 * @version     0.0.1
 * @package     Fabrika Development Team
 * @subpackage  Composers to Fabrika Development Team
 * @author      davidsnege <david.snege@gmail.com>
 * @copyright   2020 davidsnege (FabrikaDev)
 * @license     Licença de uso Somente para uso no ensino de Programação 
 * (Outros usos estão vetados)
 */

class FabrikaConnectBD{

    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db;
    public $table;
    public $data;
    public $action;
    public $fields;
    public $where;
    public $conn;

    public static function connectToDb($host, $user, $pass, $db){
        $conn = new mysqli($host, $user, $pass, $db);
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }else{
            // echo "Connected successfully";
            return $conn;
        }
    }

    // funcciones en las tablas
    public static function selectData($fields, $table, $where){
        try{
            $conn = FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
            $sql = "SELECT $fields FROM $table WHERE $where";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
                }
            }else{
                echo "0 results";
            }
            $conn->close();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage($conn->connect_error);
        }
    }

    public static function updateData($table, $fields, $data, $where){
        try{
            $conn = FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
            $sql = "UPDATE $table SET $data WHERE $where";
            $result = $conn->query($sql);
            if($result){
                echo "Data updated successfully";
            }else{
                echo "Error updating data: " . $conn->error;
            }
            $conn->close();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage($conn->connect_error);
        }
    }

    public static function insertData($table, $fields, $data){
        try{
            $conn = FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
            $sql = "INSERT INTO $table ($fields) VALUES ($data)";
            var_dump($sql);
            $result = $conn->query($sql);
            if($result){
                echo "Data inserted successfully";
            }else{
                echo "Error inserting data: " . $conn->error;
            }
            $conn->close();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage($conn->connect_error);
        }
    }

    public static function deleteData($fields, $table, $where){
        try{
            $conn = FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
            $sql = "DELETE FROM $table WHERE $where";
            $result = $conn->query($sql);
            if($result){
                echo "Data deleted successfully";
            }else{
                echo "Error deleting data: " . $conn->error;
            }
            $conn->close();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage($conn->connect_error);
        }
    }

   
}