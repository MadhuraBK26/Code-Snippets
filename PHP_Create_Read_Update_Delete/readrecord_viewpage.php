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
    <b> <?php echo $parkingData['name'];?></b>
    <br>
    <br>
                       
                      
    <label>Car Number:</label>
    <b> <?php echo $parkingData['carnumber'];?></b>
    <br>
    <br>
                      
    <label>Car model:</label>
    <b> <?php echo $parkingData['carmodel'];?></b>
    <br>
    <br>
                      
    <label>Fare per day:</label>
    <b><?php echo $parkingData['fareperday'];?></b>
    <br>
    <br>
                      
    <label>No of days:</label>
    <b> <?php echo $parkingData['noofdays'];?></b>
    <br>
    <br>
                      
    <label>No of cars:</label>
    <b> <?php echo $parkingData['noofcars'];?></b>
    </label>
    <br>
    <br>

     
     <label>Location name:</label>
    <b> <?php echo $parkingData['Location_name'];?></b>
    </label>
    <br>
    <br>

    <label>Owner name:</label>
    <b> <?php echo $parkingData['Owner_name'];?></b>
    </label>
    <br>
    <br>

    <label>Price:</label>
    <b> <?php echo $parkingData['price'];?></b>
    </label>
    <br>
    <br>

    <label>Date:</label>
    <b> <?php echo $parkingData['Parking_date'];?></b>
    </label>
    <br>
    <br>

    <div class="form-actions">
    <a class="button" href="vehicleParkingController.php?act=parkingIndex">Back</a>
    </div>
</body>
</html>
