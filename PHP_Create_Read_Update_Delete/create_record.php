<?php
ob_start();

require 'common_classfile.php';
include("create_view.php");

if (isset($_POST)) {
   // include("create_view.php");
    $application = new vehicleParkingApplication();
    $parkingResponse = $application->validateVehicleParking($_POST);

  
    if ($parkingResponse['status']) {
          $parkResponse = $application->insertVehicleParking($_POST);
          if ($parkResponse)
              header("Location:Index.php");
    }
    
}
?> 
