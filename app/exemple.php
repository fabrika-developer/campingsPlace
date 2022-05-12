<?php
require_once '../autoload.php';

echo $langBrowser . '<br>';
// echo FabrikaMakeLogs::makeLogs('Meu Log Mensagem');


// DELETE DATA
// $table = 'admin';
// $fields = 'id';
// $where = 'name = "mynames"';
// FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
// FabrikaConnectBD::deleteData($fields, $table, $where);

// UPDATE DATA
// $table = 'admin';
// $fields = 'name';
// $data = 'email = "neew", password = "naew"';
// $where = 'name = "new"';
// FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
// FabrikaConnectBD::updateData($table, $fields, $data, $where);

// INSERT DATA
// $table = 'admin';
// $fields = 'name, email, password';
// $data = '"mynames", "myemails", "mypasswords"';
// FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
// FabrikaConnectBD::insertData($table, $fields, $data);

// SELECT DATA
$table = 'admin';
$fields = 'email, password, name';
$where = 'email IS NOT NULL';
FabrikaConnectBD::connectToDb('localhost', 'root', '', 'fdt_general');
FabrikaConnectBD::selectData($fields, $table, $where);

