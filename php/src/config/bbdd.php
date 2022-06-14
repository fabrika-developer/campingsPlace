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
class Connections 
{
    public function masterDB() {

        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = '';
        return $this;
    }

    public function secondaryDB() {

        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = '';
        return $this;
    }

    public function getJson() {

        $this->host = '';
        $this->user = '';
        $this->pass = '';
        $this->db = '';
        return $this;
    }
}       
?>