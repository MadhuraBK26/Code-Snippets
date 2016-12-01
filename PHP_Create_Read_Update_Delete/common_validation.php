<?php
//echo 333;
//exit;
//require 'database.php';
error_reporting(1);
//require 'create_record.php';
//buildVehicleParking();
 

function buildVehicleParking($nameError,$carNumberError,$carModelError,$farePerDayError,$noofDaysError, $noofCarsError)
{

if ( !empty($_POST)) {
    // keep track validation errors

  /*$nameError=null;
    $carNumberError=null;
    $carModelError=null;
    $farePerDayError=null;
    $noofDaysError=null;
    $noofCarsError=null;*/
    $name = $_POST['name'];
    $carNumber = $_POST['carNumber'];
    $carModel = $_POST['carModel'];
    $farePerDay = $_POST['farePerDay'];
    $noofDays = $_POST['noofDays'];
    $noofCars = $_POST['noofCars'];
    $totalAmount = $_POST['totalAmount'];
    $totalAmount = $noofDays * $farePerDay * $noofCars;
   //
    //echo "4";
   
    
    
    // validate input
  $GLOBALS['valid'] = true; 
    if (empty($name) || is_numeric($name)) {
        $nameError = 'Please enter Name in proper format';
        echo $nameError;
        $valid = false;
         
      }
      // return  $nameError;

        
        
    
     if (empty($carNumber)) {
        $carNumberError = 'Please enter Car Number';
        $valid  = false;
      }
        
        
    
     if (empty($carModel)) {
        $carModelError = 'Please enter Car Model';
        $valid  = false;
      }
        
        
    
     if (empty($farePerDay) || ($farePerDay <= 0) || is_integer($farePerDay)) {
        $farePerDayError = 'Please enter Fare per day in proper format';
        $valid = false;
      }
        
        
    
     if (empty($noofDays) || ($noofDays <= 0) || is_integer($noofDays)) {
        $noofDaysError = 'Please enter Number of days in proper format';
        $valid  = false;
      }
        
        
    
     if (empty($noofCars) || ($noofCars <= 0) || is_integer($noofCars)) {
        $noofCarsError = 'Please enter number of cars in proper format';
        $valid  = false;
      }
    // require 'create_record.php';
  }

}
 buildVehicleParking();
 //echo 1;
 

?>