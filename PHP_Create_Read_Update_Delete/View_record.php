<?php
    require 'common_classfile.php';
// if ( !empty($_GET['id'])) {
     if(isset($_GET['id'])){
        $id = $_REQUEST['id'];
         $application = new vehicleParkingApplication();
        $data = $application->getVParking($id);
        print_r($readResponse);
        $input['name'] = $readResponse['name'];
        $input['carnumber'] = $readResponse['carnumber'];
        $input['carmodel'] = $readResponse['carmodel'];
        $input['fareperday'] = $readResponse['fareperday'];
        $input['noofdays'] = $readResponse['noofdays'];
        $input['noofcars'] = $readResponse['noofcars'];
 
 }

?>
 
<!DOCTYPE html>

    
<h3 style="color:blueviolet">Read Vehicle Parking Entry</h3>
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
    <a class="button" href="Ind1.php">Back</a>
    </div>
</body>
</html>
