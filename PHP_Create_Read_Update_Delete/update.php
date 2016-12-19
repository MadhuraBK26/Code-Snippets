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
    $data = $application->getVParking($id);
   
    $input['name'] = $data['name'];
    $input['carnumber'] = $data['carnumber'];
    $input['carmodel'] = $data['carmodel'];
    $input['fareperday'] = $data['fareperday'];
    $input['noofdays'] = $data['noofdays'];
    $input['noofcars'] = $data['noofcars'];
    $input['location_id'] = $data['locationid'];
    //echo "<pre>";print_r($input);exit;
    
}

if ($_POST) {
    //   $parking = new VehicleParking();
    $application = new vehicleParkingApplication();
    $response = $application->validateVehicleParking($_POST);
        if ($response['status']) {
        $updateResponse = $application->updateVehicleParking($_POST);
    }
        header("Location:Index.php");
}

//if (isset($_GET['locationid'])) {
     $application = new vehicleParkingApplication();
    $dataPLocation = $application->readCombinedTables($locationid);
    $input['locationname'] = $dataPLocation['Location_name'];
    $input['ownername'] = $dataPLocation['Owner_name'];
    $input['price'] = $dataPLocation['price'];
    $input['date'] = $dataPLocation['Parking_date'];
    ;
//}

if ($_POST) {
    //   $parking = new VehicleParking();
    $application = new vehicleParkingApplication();
    $response1 = $application->validateParkingLocation($_POST);
   // print_r($response1);exit;
        if ($response1['status1']) {
        $updateResponse1 = $application->updateCombinedTables($_POST);
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
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty ($input['name']) ? ($input['name']) : '';?>">
     <?php if (isset($response['messageList']['name'])):?>
     <?php echo $response['messageList']['name'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Car Number</label></td>
     <td><input name="carnumber" type="text" placeholder="Car number" value="<?php echo !empty ($input['carnumber'])? ($input['carnumber']): '';?>">
     <?php if (isset($response['messageList']['carnumber'])):?>
     <?php echo $response['messageList']['carnumber'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

  
     <td><i><label>Car Model</label></td>
     <td>  <select name ="carmodel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty( $input['carmodel']) ?  ($input['carmodel']) : '';?>"  >
     <option disabled selected value>Select</option>
     <option value="Maruti">Maruti</option>
     <option value="Ford">Ford</option>
     <option value="Volvo">Volvo</option>
     <option value="Suzuki">Suzuki</option>
     </select>
     <?php if (isset($response['messageList']['carmodel'])):?>
     <?php echo $response['messageList']['carmodel'] ;?>
     <?php endif;?>
     </td>
     </tr>
                      
     <tr>
     <td><i><label>Fare per day</label></td>
     <td> <input name="fareperday" type="text"  placeholder="Fare per day" value="<?php echo !empty($input['fareperday']) ? ($input['fareperday']) : '';?>">
     <?php if (isset($response['messageList']['fareperday'])):?>
     <?php echo $response['messageList']['fareperday'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i><label>No of days</label></td>
     <td> <input name="noofdays" type="text"  placeholder="No of days" value="<?php echo !empty($input['noofdays']) ?  ($input['noofdays']) : '';?>">
     <?php if (isset($response['messageList']['noofdays'])):?>
     <?php echo $response['messageList']['noofdays']; ?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>No of cars</label></td>
     <td>  <input name="noofcars" type="text"  placeholder="No of cars" value="<?php echo !empty($input['noofcars']) ?  ($input['noofcars']) : '';?>">
     <?php if (isset($response['messageList']['noofcars'])):?>
     <?php echo $response['messageList']['noofcars'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>Location id</label></td>
      <td><select name ="locationid" >
     <option disabled selected value>Select</option>
     <?php
     //echo $input['location_id'] . "ssdf";exit;
       $pdo = new PDO('mysql:host=localhost;dbname=ticketCalculation', 'root', 'compass');
       $sql ="SELECT Location_id, Location_name FROM VehicleParkingLocation";
      // $sql = $pdo->query("SELECT Location_name FROM VehicleParkingLocation");
        $q = $pdo->prepare($sql);
        $q->execute();
        while ($dataArray = $q->fetch(PDO::FETCH_ASSOC)){ ?>
         <option value='<?php echo $dataArray['Location_id']?>' 
         <?php if($dataArray['Location_id'] == $input['location_id']) echo "selected" ?> > <?php echo $dataArray['Location_name'] ?></option>;  
       <?php } 
        ?>
     </select>


        <td><i> <label>Location name</label></td>
         <td><select name ="locationname" >
     <option disabled selected value>Select</option>
     <?php
       $pdo = new PDO('mysql:host=localhost;dbname=ticketCalculation', 'root', 'compass');
      // $sql ="SELECT Location_id, Location_name FROM VehicleParkingLocation where Location_id = {data['location_id']}";
         $sql ="SELECT Location_id, Location_name FROM VehicleParkingLocation";
     
       //where VehicleParkingLocation .Location_id = VehicleParking .Location_id ";
      // $sql = $pdo->query("SELECT Location_name FROM VehicleParkingLocation");
       //echo $sql;exit;
        $q = $pdo->prepare($sql);
        $q->execute();
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
         echo "<option value='" .$data['Location_id']."'>" .$data['Location_name']."</option>";  
        } 
        ?>
     </select>

     
     <?php if (isset($response1['messageList1']['locationname'])):?>
     <?php echo $response1['messageList1']['locationname'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

        <td><i> <label>Owner name</label></td>
     <td>  <input name="ownername" type="text"  placeholder="No of cars" value="<?php echo !empty($input['ownername']) ?  ($input['ownername']) : '';?>">
     <?php if (isset($response1['messageList1']['ownername'])):?>
     <?php echo $response1['messageList1']['ownername'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

        <td><i> <label>Price</label></td>
     <td>  <input name="price" type="text"  placeholder="No of cars" value="<?php echo !empty($input['price']) ?  ($input['price']) : '';?>">
     <?php if (isset($response1['messageList1']['price'])):?>
     <?php echo $response1['messageList1']['price'];;?>
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
