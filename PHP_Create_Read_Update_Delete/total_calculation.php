<?php

function calculateTotal($fareperday,$noofdays,$noofcars)
{
 	$total =  $fareperday * $noofdays   *  $noofcars;
    return  $total;
}
 
?>