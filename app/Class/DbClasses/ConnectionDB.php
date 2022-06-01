<?php


class ConnectionDB
{
    
    public function getData($select, $table, $order)
    {

        $db = new PDO('mysql:host=127.18.0.2:6033;dbname=slimmysql', 'root', 'root');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // select all data from table
        $sql = ' SELECT '. $select .' FROM '. $table . ' ORDER BY '. $order;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchObject();

        return $data;

    }

}