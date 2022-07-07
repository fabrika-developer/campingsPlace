<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

$load = new queryes_crud;

echo '<div class="accordion accordion-flush" id="accordionFlushExample">
<div class="accordion-item">
  <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      Accordion Item #1
    </button>
  </h2>
  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first items accordion body.</div>
  </div>
</div>
</div>';

echo '<script>
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "© OpenStreetMap"
}).addTo(map);
</script>';

echo '<div id="map"></div>';

$selectCampingByCountry = $load->selectAllDataFromTable('raisonSociale, addressCountry, addressRegion, addressDepartement, coordLatitude, coordLongitud', 'campings_general_data_use', '', 'id');
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