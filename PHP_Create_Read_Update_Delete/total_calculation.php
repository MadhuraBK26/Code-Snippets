<?php

$fareperday =  $_POST['fareperday'];
$noofdays =  $_POST['noofdays'];
$noofcars =   $_POST['noofcars'];

 function calculateTotal($fareperday,$noofdays,$noofcars)
 {
 	
   $total =  $fareperday * $noofdays   *  $noofcars;
   return  $total;
}
 ?>