<?php
ob_start();
require 'common_classfile.php';

if (!empty($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}

if (is_null($id)) {
    header("Location: Index.php");
}

if (isset($_GET['id'])) {
    $application = new vehicleParkingApplication();
    $updateParkingData = $application->getVParking($id);
   
    $inputParking['name'] = $updateParkingData['name'];
    $inputParking['carNumber'] = $updateParkingData['carnumber'];
    $inputParking['carModel'] = $updateParkingData['carmodel'];
    $inputParking['farePerDay'] = $updateParkingData['fareperday'];
    $inputParking['noOfDays'] = $updateParkingData['noofdays'];
    $inputParking['noOfCars'] = $updateParkingData['noofcars'];
}   


if ($_POST) {

    $application = new vehicleParkingApplication();
    $parkingResponse = $application->validateVehicleParking($_POST);
        if ($parkingResponse['status']) {
              $updateResponse = $application->updateVehicleParking($_POST);
        }
         header("Location:Index.php");
}
?>


<html>
<body>
<h3 style="color:maroon">Update Ticket calculation for Vehicle Parking</h3>
 <style>
 h3 {
            text-shadow: -6px 2px 2px #999;
            font-family: "Corben";
    }
    .button {
    background-color: #E9967A;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 2px 2px;
    cursor: pointer;
}
.button2 {background-color: #008CBA;}
 </style>
 </head>
 <style>
 body {
        background-color:#F5DEB3;
      } 
</style>
<form  action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>"
 <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty ($inputParking['name']) ? ($inputParking['name']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['name'])):?>
     <?php echo $parkingResponse['messageList']['name'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Car Number</label></td>
     <td><input name="carNumber" type="text" placeholder="Car number" value="<?php echo !empty ($inputParking['carNumber'])? ($inputParking['carNumber']): '';?>">
     <?php if (isset($parkingResponse['messageList']['carNumber'])):?>
     <?php echo $parkingResponse['messageList']['carNumber'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

  
     <td><i><label>Car Model</label></td>
     <td>  <select name ="carModel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty( $inputParking['carModel']) ?  ($inputParking['carModel']) : '';?>"  >
     <option disabled selected value>Select</option>
     <option value="Maruti">Maruti</option>
     <option value="Ford">Ford</option>
     <option value="Volvo">Volvo</option>
     <option value="Suzuki">Suzuki</option>
     </select>
     <?php if (isset($parkingResponse['messageList']['carModel'])):?>
     <?php echo $parkingResponse['messageList']['carModel'] ;?>
     <?php endif;?>
     </td>
     </tr>
                      
     <tr>
     <td><i><label>Fare per day</label></td>
     <td> <input name="farePerDay" type="text"  placeholder="Fare per day" value="<?php echo !empty($inputParking['farePerDay']) ? ($inputParking['farePerDay']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['farePerDay'])):?>
     <?php echo $parkingResponse['messageList']['farePerDay'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i><label>No of days</label></td>
     <td> <input name="noOfDays" type="text"  placeholder="No of days" value="<?php echo !empty($inputParking['noOfDays']) ?  ($inputParking['noOfDays']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['noOfDays'])):?>
     <?php echo $parkingResponse['messageList']['noOfDays']; ?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>No of cars</label></td>
     <td>  <input name="noOfCars" type="text"  placeholder="No of cars" value="<?php echo !empty($inputParking['noOfCars']) ?  ($inputParking['noOfCars']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['noOfCars'])):?>
     <?php echo $parkingResponse['messageList']['noOfCars'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

    
    </table>
    <div class="form-actions">
    <input class="button" type="submit" name="submit" value="Submit" />
    <a class="button button2" href="Index.php" <?php echo "Record updated"?>>Back</a>
    </div>
    </form>
    
</body>
</html>
