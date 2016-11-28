<?php

require 'database.php';

if (!empty($_POST)) {
    // keep track validation errors
    $nameError       = null;
    $carNumberError  = null;
    $carModelError   = null;
    $farePerDayError = null;
    $noofDaysError   = null;
    $noofCarsError   = null;
    
    // keep track post values
    $name        = $_POST['name'];
    $carNumber   = $_POST['carNumber'];
    $carModel    = $_POST['carModel'];
    $farePerDay  = $_POST['farePerDay'];
    $noofDays    = $_POST['noofDays'];
    $noofCars    = $_POST['noofCars'];
    $totalAmount = $_POST['totalAmount'];
    $totalAmount = $noofDays * $farePerDay * $noofCars;
    
    
    
    // validate input
    $valid = true;
    if (empty($name) || is_numeric($name)) {
        $nameError = 'Please enter Name in proper format';
        $valid = false;
      }
        
        
    
     if (empty($carNumber)) {
        $carNumberError = 'Please enter Car Number';
        $valid  = false;
      }
        
        
    
     if (empty($carModel)) {
        $carModelError = 'Please enter Car Model';
        $valid  = false;
      }
        
        
    
     if (empty($farePerDay) || ($farePerDay <= 0) || is_integer($farePerDay)) {
        $farePerDayError = 'Please enter Fare per day in proper format';
        $valid = false;
      }
        
        
    
     if (empty($noofDays) || ($noofDays <= 0) || is_integer($noofDays)) {
        $noofDaysError = 'Please enter Number of days in proper format';
        $valid  = false;
      }
        
        
    
     if (empty($noofCars) || ($noofCars <= 0) || is_integer($noofCars)) {
        $noofCarsError = 'Please enter number of cars in proper format';
        $valid  = false;
      }
        
        
        
    
     if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO VehicleParking (name,carnumber,carmodel,fareperday,noofdays,noofcars,totalamount) values(?, ?, ?, ?, ?, ?,?)";
        $q   = $pdo->prepare($sql);
        $q->execute(array(
            $name,
            $carNumber,
            $carModel,
            $farePerDay,
            $noofDays,
            $noofCars,
            $totalAmount
        ));
        Database::disconnect();
        header("Location: Viewpage.php");
    }
}

?>
<html>
<head>
<body>
 <h3 style="color:blueviolet">Ticket Calculation:Insert values</h3>
 <style>
 h3 {
            text-shadow: -6px 2px 2px #999;
            font-family: "Corben";
    }
  </style>
  <form  action="create_record1.php" method="post">
     <div class=" <?php echo !empty($nameError) ? 'error' : '';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name) ? $name : '';?>">
     <?php if (!empty($nameError)):?>
     <?php echo $nameError;?>
     <?php endif;?>
     <tr>

     <div class="<?php echo !empty($carnumberError) ? 'error' : '';?>">
     <td><i> <label >Car Number</label></td>
     <td><input name="carNumber" type="text" placeholder="Car number" value="<?php echo !empty($carNumber) ? $carNumber : '';?>">
     <?php if (!empty($carNumberError)):?>
     <?php echo $carNumberError;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <div class=" <?php echo !empty($carModelError) ? 'error' : '';?>">
     <td><i><label>Car Model</label></td>
     <td>  <select name ="carModel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty($carModel) ? $carModel : '';?>"  >
     <option value="0">Select</option>
     <option value="Maruti">Maruti</option>
     <option value="Ford">Ford</option>
     <option value="Volvo">Volvo</option>
     <option value="Suzuki">Suzuki</option>
     </select>
     <?php if (!empty($carModelError)):?>
     <?php echo $carModelError;?>
     <?php endif;?>
     </td>
     </tr>
                      
     <tr>
     <div class=" <?php echo !empty($farePerDayError) ? 'error' : '';?>">
     <td><i><label>Fare per day</label></td>
     <td> <input name="farePerDay" type="text"  placeholder="Fare per day" value="<?php echo !empty($farePerDay) ? $farePerDay : '';?>">
     <?php if (!empty($farePerDayError)):?>
     <?php echo $farePerDayError;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <div class=" <?php echo !empty($noofDaysError) ? 'error' : '';?>">
     <td><i><label>No of days</label></td>
     <td> <input name="noofDays" type="text"  placeholder="No of days" value="<?php echo !empty($noofDays) ? $noofDays : '';?>">
     <?php if (!empty($noofDaysError)):?>
     <?php echo $noofDaysError; ?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

     <div class=" <?php echo !empty($noofCarsError) ? 'error' : '';?>">
     <td><i> <label>No of cars</label></td>
     <td>  <input name="noofCars" type="text"  placeholder="No of cars" value="<?php echo !empty($noofCars) ? $noofCars : '';?>">
     <?php if (!empty($noofCarsError)):?>
     <?php echo $noofCarsError;?>
     <?php endif;?>
     </td>
     </tr>
     <tr>
     </table>
     </form>
    
    <div class="form-actions">
    <button type="submit">Create</button>
    <a class="btn" href="Viewpage.php">Back</a>
    </div>
</body>
</html>


