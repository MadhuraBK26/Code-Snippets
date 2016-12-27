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
  <div class=" <?php echo !empty($parkingResponse['messageList']['locationName'])?'error':'';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="locationName" type="text"  placeholder="Name" value="<?php echo !empty ($_POST['locationName']) ? ($_POST['locationName']) : '';?>">
     <?php if (isset($parkingResponse['messageList']['locationName'])):?>
     <?php echo $parkingResponse['messageList']['locationName'];?>
     <?php endif;?>
     </tr>
     <tr>

     <td><i> <label >Owner name</label></td>
     <td><input name="ownerName" type="text" placeholder="owner name" value="<?php echo !empty ($_POST['ownerName'])? ($_POST['ownerName']): '';?>">
     <?php if (isset($parkingResponse['messageList']['ownerName'])):?>
     <?php echo $parkingResponse['messageList']['ownerName'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label >Price</label></td>
     <td><input name="price" type="text" placeholder="price" value="<?php echo !empty ($_POST['price'])? ($_POST['price']): '';?>">
     <?php if (isset($parkingResponse['messageList']['price'])):?>
     <?php echo $parkingResponse['messageList']['price'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <td><i> <label>Date</label></td>
     <td><input name="date" type="date" placeholder="Date" value="<?php echo !empty ($_POST['date'])? ($_POST['date']): '';?>">
     <?php if (isset($parkingResponse['messageList']['date'])):?>
     <?php echo $parkingResponse['messageList']['date'];?>
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
      <td bgcolor="mistyrose"><b>Location Id</td><b>
      <td bgcolor="mistyrose"><b>Location Name</td><b>
      <td bgcolor="mistyrose"><b>Owner name</th><b>
      <td bgcolor="mistyrose"><b>Price</th>
       <td bgcolor="mistyrose"><b>Date</th>
      <th></th>
 <?php
   
    $pdo = Database::connect();
    $sql = 'SELECT * FROM VehicleParkingLocation ORDER BY Location_id DESC';
    foreach ($pdo->query($sql) as $Parkingrow) {
    echo '<tr>';
    echo '<td>'. $Parkingrow['Location_id'] . '</td>';
    echo '<td>'. $Parkingrow['Location_name'] . '</td>';
    echo '<td>'. $Parkingrow['Owner_name'] . '</td>';
    echo '<td>'. $Parkingrow['price'] . '</td>';
    echo '<td>'. $Parkingrow['Parking_date'] . '</td>';
    echo '<td width=250>';
    echo '<a  href="Location_update.php?id='.$Parkingrow['Location_id'].'">Update</a>';
    // echo ' ';
    // echo '<a  href="delete_Parking.php?id='.$Parkingrow['Location_id'].'">Delete</a>';

    echo '</td>';
    echo '</tr>';
    }
?>
      </table>
</body>
</html>

