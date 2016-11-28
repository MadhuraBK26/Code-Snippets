<?php
    require 'database.php';

     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    
     
      if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM VehicleParking  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: Viewpage.php");
         
    }
?>
 
<html>
<body>
<h3>Delete a Customer</h3>
    <form  action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <p class="alert alert-error">Are you sure to delete ?</p>
    <div class="form-actions">
    <button type="submit">Yes</button>
    <a  href="Viewpage.php">No</a>
 </form>
</div>
</html>