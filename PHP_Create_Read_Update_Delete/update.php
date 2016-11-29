<?php
    require 'database.php';
 
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (is_null($id)) {
        header("Location: Index.php");
    }


    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $carNumberError = null;
        $carModelError = null;
        $farePerDayError = null;
        $noofDaysError = null;
        $noofCarsError = null;
         
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
            $sql = "UPDATE VehicleParking  set name = ?, carnumber = ?, carmodel = ?, fareperday = ?, noofdays = ?,noofcars = ?,totalamount = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$carNumber,$carModel,$farePerDay,$noofDays,$noofCars,$totalAmount,$id));
            Database::disconnect();
            header("Location: Index.php");
        }

    } else {

           $pdo = Database::connect();
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $sql = "SELECT * FROM VehicleParking where id = ?";
           $q = $pdo->prepare($sql);
           $q->execute(array($id));
           $data = $q->fetch(PDO::FETCH_ASSOC);
           $name = $data['name'];
           $carNumber = $data['carnumber'];
           $carModel = $data['carmodel'];
           $farePerDay = $data['fareperday'];
           $noofDays = $data['noofdays'];
           $noofCars = $data['noofcars'];
           $totalAmount = $data['totalamount'];

        Database::disconnect();
     }
?>


<html>
<body>
<h3 style="color:maroon">Update a Customer</h3>
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
 body {
        background-color:#F5DEB3;} 

</style>
<form  action="update.php?id=<?php echo $id?>" method="post">
    <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
    <table>
    <tr>
    <td><i><label>Name</label></td>
    <td> <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
    <?php if (!empty($nameError)): ?>
    <?php echo $nameError;?></span>
    <?php endif; ?><td>
    </tr>
     <tr> 

    <div class="control-group <?php echo !empty($carNumberError)?'error':'';?>">
    <td> <i><label>Car number</label></td>
    <td> <input name="carNumber" type="text" placeholder="Car Number" value="<?php echo !empty($carNumber)?$carNumber:'';?>">
    <?php if (!empty($carNumberError)): ?>
    <?php echo $carNumberError;?></span>
    <?php endif;?>
    </td>
    </tr>
    <tr>
               
  <div class="control-group <?php echo !empty($carmodelError)?'error':'';?>">
  <td><i><label>Car model</label></td>
  <td>  <select name ="carModel"  style="max-width:90%" placeholder="Car model" value="<?php echo !empty($carModel)?$carModel:'';?>"  >
  <option disabled selected value></option>
  <option value="Maruti">Maruti</option>
  <option value="Ford">Ford</option>
  <option value="Volvo">Volvo</option>
  <option value="Suzuki">Suzuki</option>
  </select>
  <?php if (!empty($carModelError)): ?>
  <?php echo $carModelError;?>
  <?php endif;?>
  </td>
  </tr>
    
  <tr>                  
  <div class="control-group <?php echo !empty($farePerDayError)?'error':'';?>">
  <td><i><label>Fare per day</label></td>
  <td> <input name="farePerDay" type="text"  placeholder="Car model" value="<?php echo !empty($farePerDay)?$farePerDay:'';?>">
  <?php if (!empty($farePerDayError)): ?>
  <?php echo $farePerDayError;?></span>
  <?php endif;?>
  </td>
  </tr>
                       
  <tr>
  <div class="control-group <?php echo !empty($noofDaysError)?'error':'';?>">
  <td><i>  <label>No of days</label></td>
  <td><input name="noofDays" type="text"  placeholder="No of days" value="<?php echo !empty($noofDays)?$noofDays:'';?>">
  <?php if (!empty($noofDaysError)): ?>
  <?php echo $noofDaysError;?></span>
  <?php endif;?>
  </td>
  </tr>
   
  <tr>                    
  <div class="control-group <?php echo !empty($noofCarsError)?'error':'';?>">
  <td><label>No of cars</label></td>
  <td><input name="noofCars" type="text"  placeholder="No of cars" value="<?php echo !empty($noofCars)?$noofCars:'';?>">
  <?php if (!empty($noofCarsError)): ?>
  <?php echo $noofCarsError;?></span>
  <?php endif;?>
  </td>
  </tr>
  </table>
                       
  <div class="form-actions">
  <button class="button" type="submit">Update</button>
  <a class="button button2" href="Index.php">Back</a>
</div>
</form>
</div>
</body>
</html>