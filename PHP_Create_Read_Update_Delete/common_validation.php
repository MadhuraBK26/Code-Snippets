<?php
//echo 'ste';
//exit;
require 'database.php';
//error_reporting(0);
//require 'create_record.php';
//buildVehicleParking();
//$valid;
//if ($_POST) {
    $_POST['name'];
    $_POST['carnumber'];
    $_POST['carmodel'];
    $_POST['fareperday'];
    $_POST['noofdays'];
    $_POST['noofcars'];
    
    
 


function buildVehicleParking($POSTArray)
{

  
  
    if ( !empty($POSTArray)) {
       $valid = true;

    // keep track validation errors

  /*$nameError=null;
    $carNumberError=null;
    $carModelError=null;
    $farePerDayError=null;
    $noofDaysError=null;
    $noofCarsError=null;*/
    
   //
   // echo "4";
   
   //global $valid;
   
  
    // validate input
 // $GLOBALS['valid'] = true; 
    //echo "1";
    if (empty($POSTArray['name'])) {
        $errorArray['name'] = 'Please enter Name in proper format';
        //$nameError = 'Please enter Name in proper format';
        //echo $nameError;
        $valid = false;
         
      }
      // return  $nameError;

        
        
    
     if (empty($POSTArray['carnumber'])) {
        $errorArray['carnumber'] = 'Please enter Car Number';
       // echo  $carNumberError;
        $valid  = false;
      }
        
        
    
     if (empty($POSTArray['carmodel'])) {
        $errorArray['carmodel'] = 'Please enter Car Model';
       // echo $carModelError;
        $valid  = false;
      }
        
        
    
     if (empty($POSTArray['fareperday'])) {
        $errorArray['fareperday'] = 'Please enter Fare per day in proper format';
       // echo  $farePerDayError;
        $valid = false;
      }
        
        
    
     if (empty($POSTArray['noofdays']))  {
        $errorArray['noofdays'] = 'Please enter Number of days in proper format';
        //echo  $noofDaysError;
        $valid  = false;
      }
        
        
    
     if (empty($POSTArray['noofcars'])) {
        $errorArray['noofcars'] = 'Please enter number of cars in proper format';
       // echo $noofCarsError;
        $valid  = false;
      }
    // require 'create_record.php';
    //}

      $response['messageList'] = $errorArray;
      $response['status'] = $valid;
      return $response;
  }
}

//buildVehicleParking();
 //echo 1;
 

?>