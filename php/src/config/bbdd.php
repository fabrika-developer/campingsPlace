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
/**
 * [Description Connections]
 */
class Connections 
{
    /**
     * @return [type]
     */
    public function masterDB() {

        $this->host = '172.23.0.2:3306';
        $this->user = 'root';
        $this->pass = 'root';
        $this->db = 'campingsPlaceMysql';
        return $this;
    }

    /**
     * @return [type]
     */
    public function secondaryDB() {

        $this->host = '172.23.0.2:3306';
        $this->user = 'root';
        $this->pass = 'root';
        $this->db = 'campingsPlaceMysql';
        return $this;
    }

    /**
     * @return [type]
     */
    public function getJson() {

        $this->host = '';
        $this->user = '';
        $this->pass = '';
        $this->db = '';
        return $this;
    }
}       
?>