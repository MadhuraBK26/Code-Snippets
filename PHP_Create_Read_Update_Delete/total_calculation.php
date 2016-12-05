 <?php
 function calculateTotal()
 {
     $_POST['totalamount'] =  $_POST['noofdays'] *  $_POST['fareperday'] *  $_POST['noofcars'];
     return  $_POST['totalamount'];
 }
 ?>