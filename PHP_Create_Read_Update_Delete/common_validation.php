<?php
class VehicleParking
{
  /**
  * Performs the validation
  *
  * @param response['messagelist']  Array structure to display the error messages.
  *
  * @return int Returns the Array.
  */
     public  function validateVehicleParking($POSTArray)
     {

         if ( !empty($POSTArray)) {
            $valid = true;

    /** keep track validation errors */

         if (empty($POSTArray['name'])) {
             $errorArray['name'] = 'Please enter Name in proper format';
             $valid = false;
         }
      
        
         if (empty($POSTArray['carnumber'])) {
             $errorArray['carnumber'] = 'Please enter Car Number';
             $valid  = false;
         }
        
         if (empty($POSTArray['carmodel'])) {
             $errorArray['carmodel'] = 'Please enter Car Model';
             $valid  = false;
         }
        
         if (empty($POSTArray['fareperday'])) {
             $errorArray['fareperday'] = 'Please enter Fare per day in proper format';
             $valid = false;
         }
        
         if (empty($POSTArray['noofdays']))  {
             $errorArray['noofdays'] = 'Please enter Number of days in proper format';
             $valid  = false;
         }
        
         if (empty($POSTArray['noofcars'])) {
             $errorArray['noofcars'] = 'Please enter number of cars in proper format';
             $valid  = false;
         }
    
      $response['messageList'] = $errorArray;
      $response['status'] = $valid;
      return $response;
    }
  }
}

?>