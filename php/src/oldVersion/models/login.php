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

    // public function login($user, $pass, $secondaryDB){
    public function login($user, $pass, $secondaryDB){

        // Construimos la variables
        $this->user = $user;
        $this->pass = $pass;
        $this->columns = ' usermail, password, username, userroll ';
        $this->from = ' user_class_admin ';
        $this->where = '';
        $this->order = ' _id ';
        // Verificamos que tiene datos de login
        if($this->user !== '' && $this->pass !== ''){
            $this->verifyCredentials = select($this->columns, $this->from, $this->where, $this->order);
        }else{
            echo 'Mensagem de necesita preencher su login';
        }
        // Verificamos que la conexion a BBDD esta hecha y ponemos status al login
        foreach ($this->verifyCredentials as $key => $value) {
            if($value['usermail'] === $this->user && $value['password'] === $this->pass){
                $paramOne = true;
            }else{
                $paramTwo = true;
            }
        }
        // Definimos que 2 es el parametro para login 
        $loginStatus = $paramOne + $paramTwo;
        // Conferimos que si esta bien creamos session o la destruimos
        if($loginStatus === 2){
            session_start();
            $_SESSION["auth"]=$loginStatus; 
            $_SESSION["hola"]=$value['usermail']; 
        }else{
            echo 'not login';
            unset($_SESSION["auth"]); 
            unset($_SESSION["hola"]); 
        }
        
        return  $this;
    }
}
