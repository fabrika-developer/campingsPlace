<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

$load = new queryes_crud;


$selectCampingByCountry = $load->selectAllDataFromTable('*', 'campings_general_data_use', '', 'id');
foreach ($selectCampingByCountry as $key => $datoscp){
    echo '<pre>';
    $datoscp['raisonSociale'] = utf8_encode(strtoupper($datoscp['raisonSociale']));
    print_r($datoscp);
    echo '</pre>';
}

echo '<nav aria-label="Page navigation example">
<ul class="pagination justify-content-end">
  <li class="page-item disabled">
    <a class="page-link">Previous</a>
  </li>
  <li class="page-item active"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#">Next</a>
  </li>
</ul>
</nav>';