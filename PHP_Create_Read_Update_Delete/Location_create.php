<?php
ob_start();

require 'common_classfile.php';
if (isset($_POST)) {
    $application = new vehicleParkingApplication();
    $response1 = $application->validateParkingLocation($_POST);
   // print_r($response1);
    //print_r($_POST);
  

    if ($response1['status1']) {
        $resp1 = $application->insertParkingLocation($_POST);
        if ($resp1)
         // echo $locationname;
            header("Location:Location_create.php");
    }
  }

/*$car_type = '';
$sql = "SELECT carmodel FROM VehicleParking";
$q = $pdo->prepare($sql);
$q->execute();*/
   
?> 
<html>
<head>
 <h3 style="color:maroon">Parking Location management</h3>
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



 <form  action="Location_create.php" method="post">
  <div class=" <?php echo !empty($response1['messageList1']['locationname'])?'error':'';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="locationname" type="text"  placeholder="Name" value="<?php echo !empty ($_POST['locationname']) ? ($_POST['locationname']) : '';?>">
     <?php if (isset($response1['messageList1']['locationname'])):?>
     <?php echo $response1['messageList1']['locationname'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Owner name</label></td>
     <td><input name="ownername" type="text" placeholder="Car number" value="<?php echo !empty ($_POST['ownername'])? ($_POST['ownername']): '';?>">
     <?php if (isset($response1['messageList1']['ownername'])):?>
     <?php echo $response1['messageList1']['ownername'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label >Price</label></td>
     <td><input name="price" type="text" placeholder="Car number" value="<?php echo !empty ($_POST['price'])? ($_POST['price']): '';?>">
     <?php if (isset($response1['messageList1']['price'])):?>
     <?php echo $response1['messageList1']['price'];?>
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
    <table width='90%' border=0>
     <tr>
      <td bgcolor="mistyrose"><b>Location Name</td><b>
      <td bgcolor="mistyrose"><b>Owner name</th><b>
      <td bgcolor="mistyrose"><b>Price</th>
      <th></th>
 <?php
   
    $pdo = Database::connect();
    $sql = 'SELECT * FROM VehicleParkingLocation ORDER BY Location_id DESC';
    foreach ($pdo->query($sql) as $Parkingrow) {
    echo '<tr>';
    echo '<td>'. $Parkingrow['Location_name'] . '</td>';
    echo '<td>'. $Parkingrow['Owner_name'] . '</td>';
    echo '<td>'. $Parkingrow['price'] . '</td>';
    echo '<td width=250>';
    echo '</td>';
    echo '</tr>';
    }
?>
      </table>
</body>
</html>

