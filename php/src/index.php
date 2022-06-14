<?php 
// TEST CASE --------------------------------------------------
// echo phpinfo();

// $host = '172.23.0.2:3306';
// $user = 'root';
// $pass = 'root';
// $bd   = 'campingsPlaceMysql';
// $table= 'user_class_admin';

// // $conn = new mysqli($host, $user, $pass, $bd);
// // $sql = mysqli_query($conn, "SELECT * FROM $table");
// // $result = mysqli_fetch_array($sql);
// // print_r($result);

// $db = new PDO('mysql:host='.$host.';dbname='.$bd.'', $user, $pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM $table";
// $stmt = $db->prepare($sql);
// $stmt->execute();
// $data = $stmt->fetchAll();

// echo '<pre>';
// print_r($data);
// echo '</pre>';

// TEST CASE --------------------------------------------------

header("Location: views/index.php");
exit();