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
     </table>
    <div class="form-actions">
    <input class="button" type="submit" name="submit" value="Submit" />
    <a class="button button2" href="Index.php" <?php echo "Record updated"?>>Back</a>
    </div>
    </form>
    
</body>
</html>
