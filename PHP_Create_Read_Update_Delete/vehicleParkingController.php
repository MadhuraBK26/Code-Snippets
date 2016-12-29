<?php
ob_start();
session_start();
require 'common_classfile.php';
//require 'total_calculation.php';
//require 'database.php';

class vehicleParkingController
{
    private $parkingModel;
    public function __construct()
    {
        $this->parkingModel = new  vehicleParkingApplication();
        
    }

    public function parkingIndex()
    {
        $parkingResponse = $this->parkingModel->joinTables();
        require 'parkingIndex.php';
    }

    public function createParkingView()
    {
        if(!empty($_SESSION['errorArray'])){
            $errorArray = $_SESSION['errorArray'];
        }
        require 'create_view.php';
    }
	 public function createParking()
	 {
        if (isset($_POST)) {
            $parkingResponse =  $this->parkingModel->validateVehicleParking($_POST,"parking");


       //if (isset($_POST)) {
   // include("create_view.php");
       //$application = new vehicleParkingApplication();
      // $parkingResponse = $application->validateVehicleParking($_POST,"parking");

  
          if (!$parkingResponse['status']) {
              $_SESSION['errorArray'] = $parkingResponse['messageList'];
              header('Location:vehicleParkingController.php?act=createParkingView');
            // $parkResponse = $application->insertVehicleParking($_POST);
            /* if ($parkResponse)
                header("Location:Index.php");*/
                 }else{
            unset($_SESSION['errorArray']);
            $parkingResponse = $this->parkingModel->insertVehicleParking($_POST);
            if ($parkingResponse) {
                header('Location:vehicleParkingController.php?act=parkingIndex');
            }
         }
        }
    }
    public function readParkingView()
    {
      require 'readrecord_viewpage';
    }
    public function readParkingController()
    {
        if (isset($_GET['id'])) {
   
       $id = $_REQUEST['id'];
    
        $parkingData = $this->parkingModel->getVParking($id);

        $inputParking['name'] = $readResponse['name'];
        $inputParking['carNumber'] = $readResponse['carnumber'];
        $inputParking['carModel'] = $readResponse['carmodel'];
        $inputParking['farePerDay'] = $readResponse['fareperday'];
        $inputParking['noOfDays'] = $readResponse['noofdays'];
        $inputParking['noOfCars'] = $readResponse['noofcars'];
        $inputParking['locationName'] = $readResponse['Location_name'];
        $inputParking['ownerName'] = $readResponse['Owner_name'];
        $inputParking['price'] = $readResponse['price'];
        $inputParking['date'] = $readResponse['Parking_date'];
    //include("readrecord_viewpage.php");
       }
    }
    public function deleteParkingView()
    {
        require 'delete_view.php';
    }
    public function deleteParkingController()
    {
        if (!empty($_GET['id'])) {
          $id = $_REQUEST['id'];
        }
        //include("delete_view.php");
        if (!empty($_POST)) {

            $id = $_POST['id'];
           
            $deleteResponse =$this->parkingModel->deleteVehicleParking($id);
            if ($deleteResponse)
                header("Location:controller.php?act=parkingIndex");
                else 
                  header("Location:controller.php?act=parkingIndex");   
        }
    }



}
$parkingController = new vehicleParkingController();
if(!isset($_REQUEST['act'])){
    $action = 'parkingIndex';
}else{
    $action = $_GET['act'];
}

$parkingController->$action();

?>
     
     