<?php
session_start();
ob_start();
require 'total_calculation.php';
require 'database.php';

class vehicleParkingApplication
{
    public $response;
    public $id;
    private $pdo;
    
    public function __construct()
    {
        $this->response = $response;
         $this->response1 = $response1;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /** function for validation*/
    public function validateVehicleParking($POSTArray)
    {
        $valid = false;
        if (!empty($POSTArray)) {
            $valid = true;
            
            /** keep track validation errors */
            if (empty($POSTArray['name'])) {
                $errorArray['name'] = 'Please enter Name in proper format';
                $valid = false;
            }
            
            if (empty($POSTArray['carnumber'])) {
                $errorArray['carnumber'] = 'Please enter Car Number';
                $valid = false;
            }
            
            if (empty($POSTArray['carmodel'])) {
                $errorArray['carmodel'] = 'Please enter Car Model';
                $valid = false;
            }
            
            if (empty($POSTArray['fareperday'])) {
                $errorArray['fareperday'] = 'Please enter Fare per day in proper format';
                $valid = false;
            }
            
            if (empty($POSTArray['noofdays'])) {
                $errorArray['noofdays'] = 'Please enter Number of days in proper format';
                $valid = false;
            }
            
            if (empty($POSTArray['noofcars'])) {
                $errorArray['noofcars'] = 'Please enter number of cars in proper format';
                $valid = false;
            }

             if (empty($POSTArray['locationid'])) {
                $errorArray['locationid'] = 'Please enter number of cars in proper format';
                $valid = false;
            }

   
        /*     if (empty($POSTArray['locationname'])) {
                $errorArray['locationname'] = 'Please enter location in proper format';
                $valid = false;
            }

             if (empty($POSTArray['ownername'])) {
                $errorArray['ownername'] = 'Please enter number of cars in proper format';
                $valid = false;
            }

             if (empty($POSTArray['price'])) {
                $errorArray['price'] = 'Please enter number of cars in proper format';
                $valid = false;
            }*/


            
            $response['messageList'] = $errorArray;
            $response['status'] = $valid;
            return $response;
        }
    }


 public function validateParkingLocation($POSTLocation)
    {
       //  $valid1 = false;
       // var_dump($POSTLocation);
       // exit;
        if (!empty($POSTLocation)) {
            $valid1 = true;
           // print_r($valid1);exit;
         if (empty($POSTLocation['locationname'])) {
                $errorArray1['locationname'] = 'Please enter location in proper format';
                $valid1 = false;
            }

             if (empty($POSTLocation['ownername'])) {
                $errorArray1['ownername'] = 'Please enter number of cars in proper format';
                $valid1 = false;
            }

             if (empty($POSTLocation['price'])) {
                $errorArray1['price'] = 'Please enter number of cars in proper format';
                $valid1 = false;
            }

             if (empty($POSTLocation['date'])) {
                $errorArray1['date'] = 'Please enter number of cars in proper format';
                $valid1 = false;
            }

            $response1['messageList1'] = $errorArray1;
            $response1['status1'] = $valid1;
            return $response1;
        }
    }


    
    /**function for inserting values*/
    public function insertVehicleParking($inputData)
    {
       
        $pdo = Database::connect();
        $fareperday = $inputData['fareperday'];
        $noofdays = $inputData['noofdays'];
        $noofcars = $inputData['noofcars'];
      
       try
       {
        $sql  = "INSERT INTO VehicleParking (name,carnumber,carmodel,fareperday,noofdays,noofcars,totalamount,Location_id) values(?, ?, ?, ?, ?, ?,?,?)";
        $q = $pdo->prepare($sql);
        $total = calculateTotal($fareperday, $noofdays, $noofcars);
        $state = $q->execute(array(
            $inputData['name'],
            $inputData['carnumber'],
            $inputData['carmodel'],
            $inputData['fareperday'],
            $inputData['noofdays'],
            $inputData['noofcars'],
            $total,
            $inputData['locationid']
        ));
        echo "Successful";
        } catch (PDOException $e) {
             $_SESSION['error'] = "The record could not be added.<br>" .$e->getMessage();
             header("Location:Index.php");
        }
             Database::disconnect();
    }


     public function insertParkingLocation($inputData)
     {
       
        $pdo = Database::connect();
        $locationname = $inputData['locationname'];
        $ownername = $inputData['ownername'];
        $price = $inputData['price'];
        $date = $inputData['date'];
        try {
        $sql  = "INSERT INTO VehicleParkingLocation (Location_name,Owner_name,price,Parking_date) values(?, ?, ?,?)";
        $q = $pdo->prepare($sql);
      //  $total = calculateTotal($locationname, $ownername, $price);
        $state = $q->execute(array(
            $inputData['locationname'],
            $inputData['ownername'],
            $inputData['price'],
            $inputData['date']
        ));
        echo "Successful";
        } catch (PDOException $e) {
             $_SESSION['error'] = "The record could not be added.<br>" .$e->getMessage();
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
        $sql = "DELETE FROM VehicleParking WHERE id = ?";
        $q = $this->pdo->prepare($sql);
        $q->execute(array(
            $id
        ));
         echo "Successful";
         } catch (PDOException $e) {
             $_SESSION['error']="The record could not deleted.<br>" .$e->getMessage();
             header("Location:Index.php"); 
    
       }
        Database::disconnect();
    }
    
    
    /** function for reading values */
    function getVParking($id)
    {
        $this->pdo = Database::connect();
        $sql = "SELECT * FROM VehicleParking where id = ?";
      

        $q = $this->pdo->prepare($sql);
        $q->execute(array(
            $id
        ));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
        return true;
    }
    
    function updateVehicleParking($inputdata)
    {

        try{
        $sql = "UPDATE VehicleParking  set name = ?, carnumber = ?, carmodel = ?, fareperday = ?, noofdays = ?,noofcars = ?,totalamount = ?, Location_id = ? WHERE id = ?";
        $q = $this->pdo->prepare($sql);
        $total = calculateTotal($inputdata['fareperday'], $inputdata['noofdays'], $inputdata['noofcars']);
       $q = $this->pdo->prepare($sql); 
       $q->execute(array(
            $inputdata['name'],
            $inputdata['carnumber'],
            $inputdata['carmodel'],
            $inputdata['fareperday'],
            $inputdata['noofdays'],
            $inputdata['noofcars'],
            $total,
            $inputdata['locationid'],
            $inputdata['id']
         ));
            echo "Successful";
        } catch (PDOException $e) {
             $_SESSION['error'] = "The record could not be updated.<br>" .$e->getMessage();
             header("Location:update.php");
        }
       // return true;
    }
    
    function readCombinedTables($locationid)
    {
         $this->pdo = Database::connect();
        try {
        $sqlcombine = "SELECT * FROM  VehicleParkingLocation,VehicleParking  WHERE VehicleParkingLocation .Location_id =VehicleParking .Location_id";
        $q = $this->pdo->prepare($sqlcombine);
         $q->execute(array(
           /* $inputdata['name'],
            $inputdata['carnumber'],
            $inputdata['carmodel'],
            $inputdata['fareperday'],
            $inputdata['noofdays'],
            $inputdata['noofcars'],
            $total,*/
           // $id,
            $locationid
          /*  $inputdata['locationid'],
            $inputData['locationname'],
            $inputData['ownername'],
            $inputData['price'],
            $inputData['date']*/
         ));
         echo "Successful";
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
       // return true;
         } catch (PDOException $e) {
             $_SESSION['error']="The record could not deleted.<br>" .$e->getMessage();
             header("Location:Index.php"); 
           }
    }

      function deleteCombinedTables($locationid)
      {
        $this->pdo = Database::connect();
        try {
        $sql = "DELETE VehicleParkingLocation,VehicleParking FROM VehicleParkingLocation,VehicleParking  WHERE VehicleParkingLocation .Location_id =VehicleParking .Location_id";
        $q = $this->pdo->prepare($sql);
        $q->execute(array(
            $locationid
        ));
         echo "Successful";
         } catch (PDOException $e) {
             $_SESSION['error']="The record could not deleted.<br>" .$e->getMessage();
             header("Location:Index.php"); 
    
       }
        Database::disconnect();
    }

      

}
?> 