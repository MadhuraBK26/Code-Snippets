<html>
</head>
<body>
<h3 align="center" style="color:maroon;">PHP Create,Read,Update,Delete form</h3>
<style>
h3 {
            text-shadow: -6px 2px 2px #999;
            font-family: "Corben";
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
      <td bgcolor="mistyrose"><b>Action</th>
      <th></th>
      </tr>
    </thead>
  <tbody>

  <?php
    include 'database.php';
    $pdo = Database::connect();
    $sql = 'SELECT * FROM VehicleParking ORDER BY id DESC';
    foreach ($pdo->query($sql) as $row) {
    echo '<tr>';
    echo '<td>'. $row['name'] . '</td>';
    echo '<td>'. $row['carnumber'] . '</td>';
    echo '<td>'. $row['carmodel'] . '</td>';
    echo '<td>'. $row['fareperday'] . '</td>';
    echo '<td>'. $row['noofdays'] . '</td>';
    echo '<td>'. $row['noofcars'] . '</td>';
    echo '<td>'. $row['totalamount'] . '</td>';
    echo '<td width=250>';
    echo '<a  href="read.php?id='.$row['id'].'">Read</a>';
    echo ' ';
    echo '<a  href="update.php?id='.$row['id'].'">Update</a>';
    echo ' ';
    echo '<a  href="delete.php?id='.$row['id'].'">Delete</a>';
    echo '</td>';
    echo '</tr>';
    }
     Database::disconnect();
  ?>
</tbody>
</table>
<br>
 <a href="create_record.php">Click for Creating a new record</a><br>
</html>