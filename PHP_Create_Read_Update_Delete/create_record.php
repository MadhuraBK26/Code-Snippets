<?php
ob_start();
require 'common_classfile.php';
if (isset($_POST)) {
    $application = new vehicleParkingApplication();
    $response = $application->validateVehicleParking($_POST);
  //  print_r($response);
    if ($response['status']) {

        $resp = $application->insertVehicleParking($_POST);

        if ($resp)
            header("Location:Index.php");
    }
    
}
?> 
<html>
<head>
 <h3 style="color:maroon">Ticket Calculation for Vehicle Parking:Insert values</h3>
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
        background-color:#F5DEB3;} 
</style>

 <form  action="create_record.php" method="post">
  <div class=" <?php echo !empty($response['messageList']['name'])?'error':'';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty ($_POST['name']) ? ($_POST['name']) : '';?>">
     <?php if (isset($response['messageList']['name'])):?>
     <?php echo $response['messageList']['name'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Car Number</label></td>
     <td><input name="carnumber" type="text" placeholder="Car number" value="<?php echo !empty ($_POST['carnumber'])? ($_POST['carnumber']): '';?>">
     <?php if (isset($response['messageList']['carnumber'])):?>
     <?php echo $response['messageList']['carnumber'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

  
     <td><i><label>Car Model</label></td>
     <td>  <select name ="carmodel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty( $_POST['carmodel']) ?  ($_POST['carmodel']) : '';?>"  >
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
     <td> <input name="fareperday" type="text"  placeholder="Fare per day" value="<?php echo !empty($_POST['fareperday']) ? ($_POST['fareperday']) : '';?>">
     <?php if (isset($response['messageList']['fareperday'])):?>
     <?php echo $response['messageList']['fareperday'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i><label>No of days</label></td>
     <td> <input name="noofdays" type="text"  placeholder="No of days" value="<?php echo !empty($_POST['noofdays']) ?  ($_POST['noofdays']) : '';?>">
     <?php if (isset($response['messageList']['noofdays'])):?>
     <?php echo $response['messageList']['noofdays']; ?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>No of cars</label></td>
     <td>  <input name="noofcars" type="text"  placeholder="No of cars" value="<?php echo !empty($_POST['noofcars']) ?  ($_POST['noofcars']) : '';?>">
     <?php if (isset($response['messageList']['noofcars'])):?>
     <?php echo $response['messageList']['noofcars'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

    <td><i> <label>Location name</label></td>
     <td><select name ="locationid" >
     <option disabled selected value>Select</option>
     <?php
       $pdo = new PDO('mysql:host=localhost;dbname=ticketCalculation', 'root', 'compass');
       $sql ="SELECT Location_id, Location_name FROM VehicleParkingLocation";
      // $sql = $pdo->query("SELECT Location_name FROM VehicleParkingLocation");
        $q = $pdo->prepare($sql);
        $q->execute();
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
         echo "<option value='" .$data['Location_id']."'>" .$data['Location_name']."</option>";  
        } 
        
     
     ?>

     </select>
     <?php if (isset($response['messageList']['locationid'])):?>
     <?php echo $response['messageList']['locationid'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>
     </table>
    
     </form>
      <div class="form-actions">
    <button class="button" type="submit">Create</button>
    <a class="button button2" href="Index.php">Back</a>
    </div>
</body>
</html>