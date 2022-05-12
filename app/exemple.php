<?php
require_once '../autoload.php';

echo $langBrowser . '<br>';
// echo FabrikaMakeLogs::makeLogs('Meu Log Mensagem');
FabrikaConnectBD::connDB($conn);
FabrikaConnectBD::closeConnDB($conn);