<?php
    require 'database.php';

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    
    if (is_null($id)) {
        header("Location: Viewpage.php");
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
    <a  href="Viewpage.php">Back</a>
    </div>
</body>
</html>