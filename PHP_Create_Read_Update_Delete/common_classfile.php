<?php
ob_start();
session_start();
require 'total_calculation.php';
require 'database.php';

class vehicleParkingApplication
{
    public $parkingResponse;
    public $id;
    private $pdo;
    
    public function __construct()
    {
        $this->parkingResponse = $parkingResponse;
        $this->locationResponse = $locationResponse;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function joinTables()
    {
        $this->pdo = Database::connect();
        try {
            $sqlParking = "SELECT * FROM VehicleParking t1 LEFT JOIN VehicleParkingLocation t2 ON t1.Location_id = t2.Location_id";
            $parkingQuery = $this->pdo->prepare($sqlParking);
            $parkingQuery->execute();
            $parkingData = $parkingQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not be updated.<br>" . $e->getMessage();
        }
        return $parkingData;
    }
    
    /** function for validation*/
  /*  public function validateVehicleParking($POSTParking)
    {
       
        if (!empty($POSTParking)) {
            $valid = true;
            
            /** keep track validation errors 
            if (empty($POSTParking['name'])) {
                $errorArray['name'] = 'Please enter Name in proper format';
                $valid = false;
            }
            
            if (empty($POSTParking['carNumber'])) {
                $errorArray['carNumber'] = 'Please enter Car Number';
                $valid = false;
            }
            
            if (empty($POSTParking['carModel'])) {
                $errorArray['carModel'] = 'Please enter Car Model';
                $valid = false;
            }
            
            if (empty($POSTParking['farePerDay'])) {
                $errorArray['farePerDay'] = 'Please enter Fare per day in proper format';
                $valid = false;
            }
            
            if (empty($POSTParking['noOfDays'])) {
                $errorArray['noOfDays'] = 'Please enter Number of days in proper format';
                $valid = false;
            }
            
            if (empty($POSTParking['noOfCars'])) {
                $errorArray['noOfCars'] = 'Please enter number of cars in proper format';
                $valid = false;
            }
            
            $parkingResponse['messageList'] = $errorArray;
            $parkingResponse['status'] = $valid;
            return $parkingResponse;
        }
    }*/
 public function validateVehicleParking($POSTParking)
 {
     $required = array('name','carNumber','carModel','farePerDay','noOfDays','noOfCars');
 
     $error = array("name"=>"Name must not be empty","carNumber"=>"carnumber must not be empty","carModel"=>"Car model must not be empty","farePerDay"=>"Fare must not be empty","noOfDays"=>"Days must not be empty","noOfCars"=>"Cars must not be emty");
  

     foreach($required as $field) {
      if (!empty($POSTParking)) {
            $valid = true;
    
            /*  if (empty($POSTParking[$field[0]])){
                    echo  $error['name']."<br>";
                    $valid=false;
                }*/
    
             if (empty($POSTParking[$field])){
              // echo  $error.= "->" . ucwords(str_replace('_',' ',$field)) . "<br />";
              /* echo  $error['name']."<br>";
               echo  $error['carNumber']."<br>";
               echo  $error['carModel']."<br>";
               echo  $error['farePerDay']."<br>";
               echo  $error['noOfDays']."<br>";
               echo  $error['noOfCars']."<br>";*/
               $valid=false;
             //  break;
           }
            $parkingResponse['messageList'] = $error;
            $parkingResponse['status'] = $valid;
            return $parkingResponse;
            
            
          
        
        }

        
    }
  
    
}


    
 
   
  

    
    public function validateParkingLocation($POSTLocation)
    {

        if (!empty($POSTLocation)) {
            $valid = true;
           //  print_r($valid1);exit;
            if (empty($POSTLocation['locationName'])) {
                $errorArray['locationName'] = 'Please enter location in proper format';
                $valid = false;
            }

            if (empty($POSTLocation['ownerName'])) {
                $errorArray['ownerName'] = 'Please enter ownername in proper format';
                $valid = false;
            }
            
            if (empty($POSTLocation['price'])) {
                $errorArray['price'] = 'Please enter price in proper format';
                $valid = false;
            }
            
            if (empty($POSTLocation['date'])) {
                $errorArray['date'] = 'Please enter date in proper format';
                $valid = false;
            }
            
            $locationResponse['messageList'] = $errorArray;
            $locationResponse['status'] = $valid;
            return $locationResponse;
        }
    }


    
    
    
    /**function for inserting values*/
    public function insertVehicleParking($inputParking)
    {
        
        $pdo = Database::connect();
        $farePerDay = $inputParking['farePerDay'];
        $noOfDays = $inputParking['noOfDays'];
        $noOfCars = $inputParking['noOfCars'];
        
        try {
            $sqlParking = "INSERT INTO VehicleParking (name,carnumber,carmodel,farePerDay,noofdays,noofcars,totalamount,Location_id) values(?, ?, ?, ?, ?, ?,?,?)";
            $parkingQuery = $pdo->prepare($sqlParking);
            $total = calculateTotal($farePerDay, $noOfDays, $noOfCars);
            $parkingState = $parkingQuery->execute(array(
                $inputParking['name'],
                $inputParking['carNumber'],
                $inputParking['carModel'],
                $inputParking['farePerDay'],
                $inputParking['noOfDays'],
                $inputParking['noOfCars'],
                $total,
                $inputParking['locationid']
            ));
            echo "Successful";
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not be added.<br>" . $e->getMessage();
            header("Location:Index.php");
        }
        Database::disconnect();
    }
    
    
    public function insertParkingLocation($inputLocation)
    {
        
        $pdo = Database::connect();
        $locationName = $inputLocation['locationName'];
        $ownerName = $inputLocation['ownerName'];
        $price = $inputLocation['price'];
        $date = $inputLocation['date'];
        try {
            $sqlLocation = "INSERT INTO VehicleParkingLocation (Location_name,Owner_name,price,Parking_date) values(?, ?, ?,?)";
            $locationQuery = $pdo->prepare($sqlLocation);
            //  $total = calculateTotal($locationname, $ownername, $price);
            $parkingState = $locationQuery->execute(array(
                $inputLocation['locationName'],
                $inputLocation['ownerName'],
                $inputLocation['price'],
                $inputLocation['date']
            ));
            echo "Successful";
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not be added.<br>" . $e->getMessage();
            header("Location:Location_create.php");
        }
        Database::disconnect();
    }
    
    
    
    
    /**function for deleting values*/
    public function deleteVehicleParking($id)
    {
        // delete data
        $this->pdo = Database::connect();
        try {
            $sqlParking = "DELETE FROM VehicleParking WHERE id = ?";
            $parkingQuery = $this->pdo->prepare($sqlParking);
            $parkingQuery->execute(array(
                $id
            ));
            
            echo "Successful";
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not deleted.<br>" . $e->getMessage();
            header("Location:Index.php");
            
        }
        Database::disconnect();
    }
    
    
    /** function for reading values */
    function getVParking($id)
    {
        $this->pdo = Database::connect();
        $sqlReadParking = "SELECT * FROM VehicleParking
                JOIN VehicleParkingLocation ON  VehicleParking.Location_id =  VehicleParkingLocation.Location_id where   VehicleParking.id = ?";
        
        $parkingQuery = $this->pdo->prepare($sqlReadParking);
        $parkingQuery->execute(array(
            $id
        ));
        $parkingData = $parkingQuery->fetch(PDO::FETCH_ASSOC);
        return $parkingData;
        return true;
    }
    
    function updateVehicleParking($updateParking)
    {
        
        try {
            $sqlParking = "UPDATE VehicleParking  set name = ?, carnumber = ?, carmodel = ?, fareperday = ?, noofdays = ?,noofcars = ?,totalamount = ? WHERE id = ?";
            $total = calculateTotal($updateParking['farePerDay'], $updateParking['noOfDays'], $updateParking['noOfCars']);
            $parkingQuery = $this->pdo->prepare($sqlParking);
            $parkingQuery->execute(array(
                $updateParking['name'],
                $updateParking['carNumber'],
                $updateParking['carModel'],
                $updateParking['farePerDay'],
                $updateParking['noOfDays'],
                $updateParking['noOfCars'],
                $total,
                $updateParking['id']
            ));
            echo "Successful";
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not be updated.<br>" . $e->getMessage();
            header("Location:update.php");
        }
        // return true;
    }


    function getParkingLocation($id)
    {
        $this->pdo = Database::connect();
        $sqlLocation = "SELECT * FROM VehicleParkingLocation where Location_id =?";
        $locationQuery = $this->pdo->prepare($sqlLocation);
        $locationQuery->execute(array(
            $id
        ));
        $locationData = $locationQuery->fetch(PDO::FETCH_ASSOC);
        return $locationData;
        return true;
    }


    function updateParkingLocation($updateLocation)
    {
        try {
            $sqlUpdateLocation = "UPDATE VehicleParkingLocation  set Location_name = ?, Owner_name = ?, price = ?, Parking_date = ? WHERE Location_id = ?";
            $locationQuery = $this->pdo->prepare($sqlUpdateLocation);
            $locationQuery->execute(array(
                    $updateLocation['locationName'],
                    $updateLocation['ownerName'],
                    $updateLocation['price'],
                    $updateLocation['date'],
                    $updateLocation['id']
            ));
            echo "Successful";
        }
         catch (PDOException $e) {
            $_SESSION['error'] = "The record could not be updated.<br>" . $e->getMessage();
            header("Location:update.php");
        }
        
    }

    function deleteParkingLocation($id)
    {
       $this->pdo = Database::connect();
        try {
            $sql = "DELETE FROM VehicleParkingLocation WHERE Location_id = ?";
            $q = $this->pdo->prepare($sql);
            $q->execute(array(
                $id
            ));
            
            echo "Successful";
        }
        catch (PDOException $e) {
            $_SESSION['error'] = "The record could not deleted.<br>" . $e->getMessage();
            header("Location:Index.php");
            
        }
        Database::disconnect(); 
    }
}
?> 