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
       // require 'create_view.php';
        if(!empty($_SESSION['errorArray'])){
            $parkingResponse = $_SESSION['errorArray'];
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

    //echo "<pre>";print_r($parkingResponse);exit;
          if (!$parkingResponse['status']) {
              $_SESSION['errorArray'] = $parkingResponse;
              header('Location:vehicleParkingController.php?act=createParkingView');
            // $parkResponse = $application->insertVehicleParking($_POST);
            /* if ($parkResponse)
                header("Location:Index.php");*/
                 }else{
            unset($_SESSION['errorArray']);
           // echo "<pre>";print_r($_POST);exit;
            $parkingResponse = $this->parkingModel->insertVehicleParking($_POST);
            if ($parkingResponse) {
                header('Location:vehicleParkingController.php?act=parkingIndex');
            }
         }
        }
    }
    public function readParkingView()
    {
       $this->readParkingController();
      //require 'readrecord_viewpage.php';
    }
    public function readParkingController()
    {
        //echo "tst" . $_GET['id'];exit;
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
        include("readrecord_viewpage.php");
       }
    }
    public function deleteParkingView()
    {
         $this->deleteParking();
        //require 'delete_view.php';
    }
    public function deleteParking()
    {

        if (!empty($_GET['id'])) {
          $id = $_REQUEST['id'];
        }
        include("delete_view.php");
        if (!empty($_POST)) {

            $id = $_POST['id'];
           
            $deleteResponse =$this->parkingModel->deleteVehicleParking($id);
            if ($deleteResponse)
                header("Location:vehicleParkingController.php?act=parkingIndex");
               // else 
                //  header("Location:controller.php?act=parkingIndex");   
        }
    }
    
    public function updateParkingView()
    {
          $this->updateParking();
         if(!empty($_SESSION['errorArray'])){
            $parkingResponse = $_SESSION['errorArray'];
        }
       // require 'update_view.php';
    }

    public function updateParking()
    {
        if (!empty($_REQUEST['id'])) {
          $id = $_REQUEST['id'];
        }

        if (is_null($id)) {
            header("Location: Index.php");
        }

        if (isset($_GET['id'])) {

             $updateParkingData = $this->parkingModel->getVParking($id);
              $inputParking['name'] = $updateParkingData['name'];
                $inputParking['carNumber'] = $updateParkingData['carnumber'];
                $inputParking['carModel'] = $updateParkingData['carmodel'];
                $inputParking['farePerDay'] = $updateParkingData['fareperday'];
                $inputParking['noOfDays'] = $updateParkingData['noofdays'];
                $inputParking['noOfCars'] = $updateParkingData['noofcars'];
                include("update_view.php");
            }

        if ($_POST) {
                $parkingResponse =   $this->parkingModel->validateVehicleParking($_POST);
        if ($parkingResponse['status']) {
              $updateResponse =   $this->parkingModel->updateVehicleParking($_POST);
        }
         header("Location:vehicleParkingController.php?act=parkingIndex");
        }
       }

    public function createLocationView()
    {
         $this->createLocation();
         if(!empty($_SESSION['errorArray'])){
            $parkingResponse = $_SESSION['errorArray'];
        }
    }
    public function createLocation()
    {
       if (isset($_POST)) {

         
         $parkingResponse = $this->parkingModel->validateVehicleParking($_POST,"location");

  
       if ($parkingResponse['status']) {
          $locResponse = $this->parkingModel->insertParkingLocation($_POST);
          if ($locResponse)
             header("Location:vehicleParkingController.php?act=createLocationView");
      }
    }
    include("Locationcreate_view.php"); 
    }

    public function updateLocationView()
    {
        $this->updateLocation();

    }

    public function updateLocation()
    {
       if (!empty($_REQUEST['id'])) {
       $id = $_REQUEST['id'];
       }

        if (is_null($id)) {
            header("vehicleParkingController.php?act=createLocationView");
        }

        if (isset($_GET['id'])) {
         
            $locationData = $this->parkingModel->getParkingLocation($id);
           
            $inputLocation['locationName'] = $locationData['Location_name'];
            //  echo "<pre>";print_r($data['Location_name']);exit;
            $inputLocation['ownerName'] = $locationData['Owner_name'];
            $inputLocation['price'] = $locationData['price'];
            $inputLocation['date'] = $locationData['Parking_date'];
            include("Locationupdate_view.php");

        }   


        if ($_POST) {
    
            $locationResponse = $this->parkingModel->validateVehicleParking($_POST,"location");
              // echo "<pre>";print_r($response1);exit;
                if ($locationResponse['status']) {
                    $updateResponse = $this->parkingModel->updateParkingLocation($_POST);
                 }
                 header("Location:vehicleParkingController.php?act=updateLocationView");
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
     
     