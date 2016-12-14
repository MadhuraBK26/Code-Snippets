<?php

     
    require 'database.php';
  
   
    if ( !empty($_POST)) {
        // keep track validation errors
        $locationNameError = null;
        $ownerNameError = null;
        $priceError = null;
       
         
        // keep track post values
          $valid = true;
        $locationName = $_POST['locationName'];
        $ownerName = $_POST['ownerName'];
        $price = $_POST['price'];
       

         
         
        // validate input
      
        if (empty($locationName)) {
            $locationNameError = 'Please enter Name ';
            $valid = false;
        
         
        } if (empty($ownerName)) {
            $ownerNameError = 'Please enter owner name';
            $valid = false;  
        
         
       }  if (empty($price)) {
            $priceError = 'Please enter price';
            $valid = false;
        
        
       }  
            if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO VehicleParkingLocation (Location_name,Owner_name,price) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($locationName,$ownerName,$price));
            Database::disconnect();
            header("Location: Location_index.php");
        }
      }
    
?>
<html>
<head>
<body>
 <h3 style="color:blueviolet">Location:Insert values</h3>
 <style>
 h3 {
            text-shadow: -6px 2px 2px #999;
            font-family: "Corben";
           }
           </style>
    <form  action="Location_create.php" method="post">
      <div class=" <?php echo !empty($locationNameError)?'error':'';?>">
      <table>
      <tr>
      <td><i> <label>Location Name</label></td>
      <td><input name="locationname" type="text"  placeholder="Name" value="<?php echo !empty($locationname)?$name:'';?>">
      <?php if (!empty($locationNameError)): ?>
      <?php echo $locationNameError;?>
      <?php endif; ?>
      <tr>

      <div class="<?php echo !empty($ownerNameError)?'error':'';?>">
      <td><i> <label >Owner name</label></td>
      <td>   <input name="ownername" type="text" placeholder="Car number" value="<?php echo !empty($ownername)?$ownername:'';?>">
      <?php if (!empty($ownerNameError)): ?>
      <?php echo $ownerNameError;?>
      <?php endif;?>
      </td>
      </tr>
      <tr>


<div class="form-actions">
    <button type="submit">Create</button>
 
    </div>
</body>
</html>



