<?php
ob_start();
require 'common_classfile.php';

if (!empty($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}

if (is_null($id)) {
    header("Location: Location_create.php");
}

if (isset($_GET['id'])) {
    $application = new vehicleParkingApplication();
    $data = $application->getParkingLocation($id);
    // $input['locationid'] = $data['Location_id'];
    $input['locationname'] = $data['Location_name'];
  //  echo "<pre>";print_r($data['Location_name']);exit;
    $input['ownername'] = $data['Owner_name'];
    $input['price'] = $data['price'];
    $input['date'] = $data['Parking_date'];

  }   


if ($_POST) {
    //   $parking = new VehicleParking();
    $application = new vehicleParkingApplication();
    $response1 = $application->validateParkingLocation($_POST);
      // echo "<pre>";print_r($response1);exit;
        if ($response1['status1']) {
          //  echo "<pre>";print_r($response);exit;
            $updateResponse = $application->updateParkingLocation($_POST);
         }
         header("Location:Location_create.php");
}
?>


<html>
<body>
<h3 style="color:maroon">Update Ticket calculation for Vehicle Parking</h3>
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
        background-color:#F5DEB3;
      } 
</style>
<form  action="Location_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <table>
     <td><i> <label>Name</label></td>
     <td><input name="locationname" type="text"  placeholder="Name" value="<?php echo !empty ($_POST['locationname']) ? ($_POST['locationname']) : '';?>">
     <?php if (isset($response1['messageList1']['locationname'])):?>
     <?php echo $response1['messageList1']['locationname'];?>
     <?php endif;?>
     </tr>
     <tr>
    
    

     <td><i> <label >Owner name</label></td>
     <td><input name="ownername" type="text" placeholder="ownername" value="<?php echo !empty ($input['ownername'])? ($input['ownername']): '';?>">
     <?php if (isset($response1['messageList1']['ownername'])):?>
     <?php echo $response1['messageList1']['ownername'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>

  
     <td><i><label>Price</label></td>
     <td>  <input name ="price"  type="text" value="<?php echo !empty( $input['price']) ?  ($input['price']) : '';?>"  >
     <?php if (isset($response1['messageList1']['price'])):?>
     <?php echo $response1['messageList1']['price'] ;?>
     <?php endif;?>
     </td>
     </tr>
                      
     <tr>
     <td><i><label>Parking date</label></td>
     <td> <input name="date" type="text"  placeholder="date" value="<?php echo !empty($input['date']) ? ($input['date']) : '';?>">
     <?php if (isset($response1['messageList1']['date'])):?>
     <?php echo $response1['messageList1']['date'];?>
     <?php endif;?>
     </td>
     </tr>
     <tr>
    
    </table>
    <div class="form-actions">
    <input class="button" type="submit" name="submit" value="Submit" />
    <a class="button button2" href="Location_create.php" <?php echo "Record updated"?>>Back</a>
    </div>
    </form>
    
</body>
</html>