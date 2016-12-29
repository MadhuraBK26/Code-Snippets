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

 <form  action="vehicleParkingController.php?act=createParking" method="post">
  <div class=" <?php echo !empty($parkingResponse['messageList']['name'])?'error':'';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty ($_POST['name']) ? ($_POST['name']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['name'])):?>
     <?php echo $parkingResponse['messageList']['name'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Car Number</label></td>
     <td><input name="carNumber" type="text" placeholder="Car number" value="<?php echo !empty ($_POST['carNumber'])? ($_POST['carNumber']): '';?>">
     <?php if (isset($parkingResponse['messageList']['carNumber'])):?>
     <?php echo $parkingResponse['messageList']['carNumber'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

  
     <td><i><label>Car Model</label></td>
     <td>  <select name ="carModel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty( $_POST['carModel']) ?  ($_POST['carModel']) : '';?>"  >
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
     <td> <input name="farePerDay" type="text"  placeholder="Fare per day" value="<?php echo !empty($_POST['farePerDay']) ? ($_POST['farePerDay']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['farePerDay'])):?>
     <?php echo $parkingResponse['messageList']['farePerDay'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i><label>No of days</label></td>
     <td> <input name="noOfDays" type="text"  placeholder="No of days" value="<?php echo !empty($_POST['noOfDays']) ?  ($_POST['noOfDays']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['noOfDays'])):?>
     <?php echo $parkingResponse['messageList']['noOfDays']; ?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>No of cars</label></td>
     <td>  <input name="noOfCars" type="text"  placeholder="No of cars" value="<?php echo !empty($_POST['noOfCars']) ?  ($_POST['noOfCars']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['noOfCars'])):?>
     <?php echo $parkingResponse['messageList']['noOfCars'];;?>
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
        $q = $pdo->prepare($sql);
        $q->execute();
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
         echo "<option value='" .$data['Location_id']."'>" .$data['Location_name']."</option>";  
        } 
     ?>

     </select>
     <?php if (isset($parkingResponse['messageList']['locationid'])):?>
     <?php echo $parkingResponse['messageList']['locationid'];;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>
     </table>
    
     </form>
    <div class="form-actions">
    <button class="button" type="submit">Create</button>
    <a class="button button2" href="parkingIndex.php">Back</a>
    </div>
</body>
</html>