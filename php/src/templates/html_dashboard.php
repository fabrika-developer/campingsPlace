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
// Carga del la classe de crud
require_once('../controllers/crud.php');
require_once('../models/verifyer.php');


if (ISSET($_POST['user'])) {
    $user = $_POST['user']; 
}
if (ISSET($_POST['pass'])) {
    $pass = $_POST['pass'];
} 

$selectCampingByCountry = select('*', 'campings_general_data', 'WHERE camping_id = 1', '_id');
foreach ($selectCampingByCountry as $key => $datoscp){
    $datoscp['camping_description_large'] = utf8_encode($datoscp['camping_description_large']);
}


echo '"', __NAMESPACE__, '"';

echo '

<!-- CARD -->

    <div class="card text-center" style="width: auto;">
    <img src="'.$datoscp['camping_default_banner'].'" class="card-img-top" alt="tmp">
    <div class="card-header">
        Camping '.$datoscp['camping_name'].'  
        <p class="card-text">'.$datoscp['camping_classification_rate'].'</p>
    </div>
    <div class="card-body">

<!-- TABS -->
        <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos Generales</button>

        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Medios de Contacto</button>

        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Descripción</button>

        <button class="nav-link" id="nav-social-tab" data-bs-toggle="tab" data-bs-target="#nav-social" type="button" role="tab" aria-controls="nav-social" aria-selected="false">Social Links</button>

        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        </p>
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
                <h5 class="card-title">Camping '.$datoscp['camping_name'].'</h5>
                <p class="card-text">'.$datoscp['camping_title'].'</p>
                <p class="card-text">'.$datoscp['camping_title'].'</p>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            
                <p class="card-text">'.$datoscp['camping_address'].'</p>
                <p class="card-text">'.$datoscp['camping_contact_mail'].'</p>
                <p class="card-text">'.$datoscp['camping_contact_phone'].'</p>
            
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            

                <p class="card-text">'.$datoscp['camping_description_default'].'</p>
                <p class="card-text">'.$datoscp['camping_description_large'].'</p>

            </div>
            <div class="tab-pane fade" id="nav-social" role="tabpanel" aria-labelledby="nav-social-tab">
            

                <p class="card-text">'.$datoscp['camping_social_twitter'].'</p>
                <p class="card-text">'.$datoscp['camping_social_instagram'].'</p>

            </div>
        </div>
<!-- TABS -->
</p>
<!-- DISPONIBILIDADES -->
        <div class="card">

        <div class="card-body">
        ';
            $selectAvailabilityByCamping = select('*','places_campings_availability', 'WHERE availability_id ='.$datoscp['_id'], '_id');
            foreach ($selectAvailabilityByCamping as $key => $datosava){


                echo '
                    <div class="accordion" id="accordionPanelsStayOpenExample">

                    <div class="accordion-item">
     
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-'.$datosava['_id'].'" aria-expanded="true" aria-controls="panelsStayOpen-'.$datosava['_id'].'">
                            '.$datosava['availability_name'].'
                        </button>
                        </h2>

                        <div id="panelsStayOpen-'.$datosava['_id'].'" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">';


                            echo '<div class="col">';
                                echo '<img src="'.$datosava['availability_default_thumb'].'" width="100" height="100" alt="tmp">';
                            echo '</div>';

                            echo '<div class="col">'; 
                                print_r($datosava);
                            echo '</div>';


                            
                            $thingsPlacesAvailability = select('*', 'things_places_availability', 'WHERE things_id = '.$datosava['_id'], '_id');
                            foreach ($thingsPlacesAvailability as $key => $datosth){
                               
                                echo'
                                <div class="card">
                                <div class="card-body">';
                                    print_r($datosth);
                                echo'
                                </div>
                                </div>';
                               
                            }
                            

                echo    '</div>
                        </div>

                    </div>
                    </div>
                ';        

            }
echo '
        </div>
        </div>
<!-- DISPONIBILIDADES -->


    </div>
    
    <div class="card-footer text-muted">
        ultimo cambio en:  '.$datoscp['camping_date_change'].' 
    </div>
    </div>
';




