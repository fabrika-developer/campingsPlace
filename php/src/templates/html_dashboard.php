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

if (ISSET($_POST['user'])) {
    $user = $_POST['user']; 
}
if (ISSET($_POST['pass'])) {
    $pass = $_POST['pass'];
} 


// Carga del la classe de CrudDB
require_once('../controllers/CrudDB.php');

// Tabela de lo select
echo '<table class="table">';
echo '    <thead>';
echo '        <tr>';
echo '        <th scope="col"> ID </th>';
echo '        <th scope="col"> User </th>';
echo '        <th scope="col"> Email </th>';
echo '        <th scope="col"> Roll </th>';
echo '        </tr>';
echo '    </thead>';

// _id 	username 	password 	usermail 	userroll 	datechange 	
$consulta = select('*', 'user_class_admin', '', '_id');

foreach ($consulta as $key => $datos) {
    //  table user_class_admin
    echo '    <tbody>';
    echo '        <tr>';
    echo '        <th scope="row">'.$datos['_id'].'</th>';
    echo '        <th scope="row">'.$datos['username'].'</th>';
    echo '        <th scope="row">'.$datos['usermail'].'</th>';
    echo '        <th scope="row">'.$datos['userroll'].'</th>';
    echo '        </tr>';
    echo '    </tbody>';
}
echo '</table>';
// --- Fim ---

$htmlFormLogin = '
<h2>
My DashBoard
</h2>

<div class="container">

<div class="row">

    <div class="card text-center" style="width: 18rem; margin: 1rem;">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        1 days ago
      </div>
    </div>

</div>


<div class="row">

    <!--CARD-->
    <div class="card" style="width: 18rem; margin: 1rem;">
      
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
      </div>
      <ul class="list-group list-group-flush">

        <li class="list-group-item">An item 
        <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </li>

        <li class="list-group-item">A second item
        <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </li>
        
        <li class="list-group-item">A third item
        <div class="progress">
        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </li>

      </ul>
      <div class="card-body">
        <button class="btn btn-sm btn-dark btn-block" type="submit">Card Link</button>
      </div>
    </div>
    <!--CARD-->


</div>
</div>
';


