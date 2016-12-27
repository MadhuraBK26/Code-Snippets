<?php
ob_start();
 
require 'common_classfile.php';
include("Locationcreate_view.php");
if (isset($_POST)) {

    $application = new vehicleParkingApplication();
    $locationResponse = $application->validateParkingLocation($_POST);

  
    if ($locationResponse['status']) {
        $locResponse = $application->insertParkingLocation($_POST);
        if ($locResponse)
            header("Location:Location_create.php");
    }
  }
   
?> 
