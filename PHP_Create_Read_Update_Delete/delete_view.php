<html>
<body>
<h3 style="color:maroon">Delete a Customer</h3>
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
    <form  action="vehicleParkingController.php?act=deleteParking" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <p class="alert alert-error">Are you sure to delete ?</p>
    <div class="form-actions">
    <button class="button" type="submit">Yes</button>
     <a class="button button2" href="vehicleParkingController.php?act=parkingIndex">No</a>
</div>
</html>
