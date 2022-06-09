
<?php

// Carga del Bootstrap del Topor de la Pagina
include 'top.php';

// Carga del la classe de CrudDB
require_once('../Controllers/CrudDB.php');

// Tabela de lo select
echo '<table class="table">';
echo '    <thead>';
echo '        <tr>';
echo '        <th scope="col"> id </th>';
echo '        <th scope="col"> user </th>';
echo '        <th scope="col"> email </th>';
echo '        <th scope="col"> tele </th>';
echo '        </tr>';
echo '    </thead>';

$consulta = select('*', 'test', '', 'id');
foreach ($consulta as $key => $datos) {
    # table users
    echo '    <tbody>';
    echo '        <tr>';
    echo '        <th scope="row">'.$datos['id'].'</th>';
    echo '        <th scope="row">'.$datos['name_user'].'</th>';
    echo '        <th scope="row">'.$datos['email'].'</th>';
    echo '        <th scope="row">'.$datos['tele'].'</th>';
    echo '        </tr>';
    echo '    </tbody>';
}
echo '</table>';
// --- Fim ---

// Carga del Bootstrap del Footer de la Pagina
include 'bottom.php';