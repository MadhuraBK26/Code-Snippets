<?php

require 'database.php';
//require 'create_record.php';

if ( !empty($_POST)) {
    // keep track validation errors

  /*$nameError=null;
    $carNumberError=null;
    $carModelError=null;
    $farePerDayError=null;
    $noofDaysError=null;
    $noofCarsError=null;*/
    
    
    $name = $_POST['name'];
    $carNumber = $_POST['carNumber'];
    $carModel = $_POST['carModel'];
    $farePerDay = $_POST['farePerDay'];
    $noofDays = $_POST['noofDays'];
    $noofCars = $_POST['noofCars'];
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
    // require 'create_record.php';
    }
    

      ?>

   <html>
 <h3 style="color:maroon">Ticket Calculation:Insert values</h3>
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
    <form  action="create_record.php" method="post">
   <div class=" <?php echo !empty($nameError) ? 'error' : '';?>">
     <table>
     <tr>
     <td><i> <label>Name</label></td>
     <td><input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name) ? $name : '';?>">
     <?php if (!empty($nameError)):?>
     <?php echo $nameError;?>
     <?php endif;?>
     </tr>
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
     <option disabled selected value></option>
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
    <button class="button" type="submit">Create</button>
    <a class="button button2" href="Index.php">Back</a>
    </div>
</body>
</html>

 </html>
     </html>




  