<?php

require_once('../Class/DbClasses/ConnectionDB.php');

$newQuery = new ConnectionDB();
$call = $newQuery->getData('*', 'test', 'id');

echo $call->id;
echo $call->name_user;
echo $call->email;

