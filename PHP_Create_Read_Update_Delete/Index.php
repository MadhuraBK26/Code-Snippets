<?php 
session_start();
//include 'database.php';
require('common_classfile.php');
if (isset($_SESSION['error'])) {
     echo $_SESSION['error'];
     unset($_SESSION['error']);
}

$application = new vehicleParkingApplication();
$parkingData = $application->joinTables();

?>
<html>
</head>
<body>
<h3 align="center" style="color:maroon;"> Vehicle Parking Management</h3>
<style>
h3 {
            text-shadow: -6px 2px 2px #999;
            font-family: "Corben";
   }
 body {
        background-color:#F5DEB3;
      }
 
</style>
<table>
  <thead>
  <table width='90%' border=0>
     <tr>
      <td bgcolor="mistyrose"><b>Name</td><b>
      <td bgcolor="mistyrose"><b>Car number</th><b>
      <td bgcolor="mistyrose"><b>Car model</th>
      <td bgcolor="mistyrose"><b>Fare per day</th>
      <td bgcolor="mistyrose"><b>No of days</th>
      <td bgcolor="mistyrose"><b>No of cars</th>
      <td bgcolor="mistyrose"><b>Total amount</th>
       <td bgcolor="mistyrose"><b>Location</th>
      <td bgcolor="mistyrose"><b>Action</th>
      <th></th>
      </tr>
    </thead>
  <tbody>

  <?php
    
  /*  $pdo = Database::connect();
    $sql = 'SELECT * FROM VehicleParking ORDER BY id DESC';
    foreach ($pdo->query($sql) as $VehicleParkingrow) {
    echo '<tr>';
    echo '<td>'. $VehicleParkingrow['name'] . '</td>';
    echo '<td>'. $VehicleParkingrow['carnumber'] . '</td>';
    echo '<td>'. $VehicleParkingrow['carmodel'] . '</td>';
    echo '<td>'. $VehicleParkingrow['fareperday'] . '</td>';
    echo '<td>'. $VehicleParkingrow['noofdays'] . '</td>';
    echo '<td>'. $VehicleParkingrow['noofcars'] . '</td>';
    echo '<td>'. $VehicleParkingrow['totalamount'] . '</td>';
    echo '<td>'. $VehicleParkingrow['Location_id'] . '</td>';
    echo '<td width=250>';
    echo '<a class="button" href="View_record.php?id='.$VehicleParkingrow['id'].'">Read</a>';
    echo ' ';
    echo '<a  href="update.php?id='.$VehicleParkingrow['id'].'">Update</a>';
    echo ' ';
    echo '<a class="button" href="delete.php?id='.$VehicleParkingrow['id'].'">Delete</a>';
    echo '</td>';
    echo '</tr>';
    }*/
  

    foreach ($parkingData as $VehicleParkingrow) {
    echo '<tr>';
    echo '<td>'. $VehicleParkingrow['name'] . '</td>';
    echo '<td>'. $VehicleParkingrow['carnumber'] . '</td>';
    echo '<td>'. $VehicleParkingrow['carmodel'] . '</td>';
    echo '<td>'. $VehicleParkingrow['fareperday'] . '</td>';
    echo '<td>'. $VehicleParkingrow['noofdays'] . '</td>';
    echo '<td>'. $VehicleParkingrow['noofcars'] . '</td>';
    echo '<td>'. $VehicleParkingrow['totalamount'] . '</td>';
    echo '<td>'. $VehicleParkingrow['Location_name'] . '</td>';
    echo '<td width=250>';
    echo '<a class="button" href="View_record.php?id='.$VehicleParkingrow['id'].'">Read</a>';
    echo ' ';
    echo '<a  href="update.php?id='.$VehicleParkingrow['id'].'">Update</a>';
    echo ' ';
    echo '<a class="button" href="delete.php?id='.$VehicleParkingrow['id'].'">Delete</a>';
    echo '</td>';
    echo '</tr>';
  }

?>
</tbody>
</table>
<br>
 <a href="create_record.php">Create a new Vehicle Parking slot</a><br>
  <a href="Location_create.php">Create  Parking location</a><br>
</html>

