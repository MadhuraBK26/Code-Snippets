<?php
    require 'database.php';

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    
    if (is_null($id)) {
        header("Location: Index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM VehicleParking where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>

    
<h3 style="color:blueviolet">Read a Customer</h3>
<style>
body {
        background-color:#F5DEB3;}
    .button 
    {
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
        </style>


    <label>Name:</label>
    <b> <?php echo $data['name'];?></b>
    <br>
    <br>
                       
                      
    <label>Car Number:</label>
    <b> <?php echo $data['carnumber'];?></b>
    <br>
    <br>
                      
    <label>Car model:</label>
    <b> <?php echo $data['carmodel'];?></b>
    <br>
    <br>
                      
    <label>Fare per day:</label>
    <b><?php echo $data['fareperday'];?></b>
    <br>
    <br>
                      
    <label>No of days:</label>
    <b> <?php echo $data['noofdays'];?></b>
    <br>
    <br>
                      
    <label>No of cars:</label>
    <b> <?php echo $data['noofcars'];?></b>
    </label>
    <br>
    <br>
                      
    <div class="form-actions">
    <a class="button" href="Index.php">Back</a>
    </div>
</body>
</html>