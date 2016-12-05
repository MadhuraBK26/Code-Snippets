<?php

 function calculateTotal($fareperday,$noofdays,$noofcars)
 {
 	$noofdays = $_POST['noofdays'];
    $fareperday = $_POST['fareperday'];
    $noofcars = $_POST['noofcars'];
    $total = $_POST['totalamount'];
    $total =  $noofdays *  $fareperday *  $noofcars;
    return  $total;
}
 ?>