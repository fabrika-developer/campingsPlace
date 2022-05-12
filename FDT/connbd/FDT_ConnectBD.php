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

    public $conn;

    public static function connDB($conn){

        // Declaramos variables
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "mysql";

        // Conectamos ao banco de dados
        $conn = new mysqli($host, $user, $pass, $db);

        // Verificamos se a conexão foi realizada com sucesso
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully <br>";
        }
    }

    public static function closeConnDB($conn){
        // Fechamos a conexão
        echo "Connection closed <br>";
        $conn->close();
    }
}