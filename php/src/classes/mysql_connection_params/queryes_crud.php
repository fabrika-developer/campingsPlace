<?php
class queryes_crud
{
    public function connectionData()
    {
        $db = new PDO('mysql:host=mysqlhost:3306;dbname=campingsPlaceMysql', 'root', 'root', array('charset'=>'utf8'));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->query("SET CHARACTER SET utf8");
        return $db;
    }

    public function selectAllDataFromTable($select,$from,$where,$order)
    {
        $db = $this->connectionData();
        $sql = "SELECT ".$select." FROM ".$from." ".$where." ORDER BY ".$order."";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function insertDataToTable($database, $values)
    {
        $db = $this->connectionData();
        $sql = "INSERT INTO ".$database." (".implode(",", array_keys($values)).") VALUES (:".implode(",:", array_keys($values)).")";
        $stmt = $db->prepare($sql);
        $stmt->execute($values);
        // $data = $stmt->fetchAll();
    }

    public function updateDataToTable($database, $values, $where)
    {
        $a = 0;
        $setValue = '';
        while ($a <= count($values)) {
            $setValue .= "".array_keys($values)[$a]. '="' .array_values($values)[$a] . '", ';
            $a++;
        }
        $aA = $a + 3;
        $setValue2 = substr($setValue, 0, -$aA);

            $db = $this->connectionData();
            $sql = "UPDATE ". $database ." 
            SET ". $setValue2 ." 
            WHERE ". $where ." ";
            $stmt = $db->prepare($sql);
            $stmt->execute();
    }

    public function deleteDataToTable($database, $where)
    {
        $db = $this->connectionData();
        $sql = "DELETE FROM ".$database." WHERE ".$where."";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}