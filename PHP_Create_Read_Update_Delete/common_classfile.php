 <?php

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
            
            $response['messageList'] = $errorArray;
            $response['status'] = $valid;
            return $response;
        }
    }
    
    /**function for inserting values*/
    public function insertVehicleParking($inputData)
    {
       
        $pdo = Database::connect();
        $fareperday = $inputData['fareperday'];
        $noofdays = $inputData['noofdays'];
        $noofcars = $inputData['noofcars'];
        
        $sql   = "INSERT INTO VehicleParking (name,carnumber,carmodel,fareperday,noofdays,noofcars,totalamount) values(?, ?, ?, ?, ?, ?,?)";
        $q = $pdo->prepare($sql);
        $total = calculateTotal($fareperday, $noofdays, $noofcars);
        $state = $q->execute(array(
            $inputData['name'],
            $inputData['carnumber'],
            $inputData['carmodel'],
            $inputData['fareperday'],
            $inputData['noofdays'],
            $inputData['noofcars'],
            $total
        ));
        if($state) {
            echo 'Query successful';
        } else {
            echo "Query failed";
        }
        Database::disconnect();
      //  return true;
        
    }
    
    /**function for deleting values*/
    public function deleteVehicleParking($id)
    {
        // delete data
        $this->pdo = Database::connect();
        $sql = "DELETE FROM  WHERE id = ?";
        $q = $this->pdo->prepare($sql);
        $q->execute(array(
            $id
        ));
        Database::disconnect();
        return true;
    }
    
    
    /** function for reading values*/
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
        $sql = "UPDATE VehicleParking  set name = ?, carnumber = ?, carmodel = ?, fareperday = ?, noofdays = ?,noofcars = ?,totalamount = ? WHERE id = ?";
        $q = $this->pdo->prepare($sql);
        $total = calculateTotal($inputdata['fareperday'], $inputdata['noofdays'], $inputdata['noofcars']);
        $q->execute(array(
            $inputdata['name'],
            $inputdata['carnumber'],
            $inputdata['carmodel'],
            $inputdata['fareperday'],
            $inputdata['noofdays'],
            $inputdata['noofcars'],
            $total,
            $inputdata['id']
        ));
        return true;
    }
}
?> 