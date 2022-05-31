<?php

    function getData($select, $table)
    {
        $db = new PDO('mysql:host=127.19.0.2:6033;dbname=slimmysql', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $sql = "SELECT $select FROM $table";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        echo '<pre>';
        print_r($data);
        echo '</pre>';
    };

    getData('*', 'test');