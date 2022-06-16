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
// require_once("../config/ConnectionDB.php");

class login {

    public function login($user, $pass, $secondaryDB){

        $this->user = $user;
        $this->pass = $pass;

        $connection = new mysqli ($secondaryDB->host, $secondaryDB->user, $secondaryDB->pass, $secondaryDB->db);
        $sql =  "SELECT * FROM user_class_admin WHERE usermail = '$this->user' ";
        $result = mysqli_query($connection, $sql);

        // print_r($user);
        // print_r($pass);
        // print_r($secondaryDB);
     
        while ($row = mysqli_fetch_array($result)){
            // Seteamos las variables
            $this->name = $row['username'];
            $this->email = $row['usermail'];
            $this->role = $row['userrolle'];
            $this->password = $row['password'];
        }

        $this->hash = $this->password;
        $this->auth = true;

        if (password_verify($this->pass, $this->hash)) {
            // $this->auth = '¡La contraseña es válida!';
            setcookie("auth", $this->auth, time() + 3600);
            setcookie("hola", $this->name, time() + 3600);
        } else {
            // $this->auth = 'La contraseña no es válida.';
            setcookie("auth", "", time() - 3600);
            setcookie("hola", "", time() - 3600);
        }

        echo "<br><br>";

        return  $this;
    }
}
