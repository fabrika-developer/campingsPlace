<?php
// connection to database
$db = new PDO('mysql:host=127.18.0.2:6033;dbname=slimmysql', 'root', 'root');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// check if connection is successful
if (!$db) {
    echo 'Connection failed';
} else {
    echo 'Connection successful';
}

// select all data from table
$sql = 'SELECT * FROM test';
$stmt = $db->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();

// print data
echo '<pre>';
print_r($data);
echo '</pre>';

