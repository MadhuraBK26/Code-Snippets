<html>
<h2 align="center">Multiple choice questions form</h2>
<form  method="post" action=""  >
  <i><b>1.Which of the following type of class allows only one object of it to be created?<br></b></i></td>
  <input type="radio" name="name" value="(1)Abstract class" >(1)Abstract class <br>
  <input type="radio" name="name" value="(2)Singleton class" >(2)Singleton class
  <br> 
  <input type="radio" name="name" value="(3)Friend class" >(3)Friend class <br>
  <input type="submit" name="btn_submit" value="Submit"> <br><br>
  <input type="submit" name="btn_submit1" value="Submit1"> <br><br>
 </form>
 </html>



<?php

$input = array(
    "1.Which of the following type of class allows only one object of it to be created?" => array(
        
        "(1)Abstract class" => false,
        "(2)Singleton class" => true,
        "(3)Friend class" => false
    ),
    
    "2.Which of the following is not a type of constructor?" => array(
        "(1)Copy constructor" => false,
        "(2)Friend constructor" => true,
        "(3)Default constructor" => false,
        "(4)Parameterized constructor" => false
    )
);
?>


 <?php

if (isset($_POST['btn_submit1'])) {
    
    //print $input['1.Which of the following type of class allows only one object of it to be created?'][1][1];
    // $correctans=array_column($input,'correctans');
    // print_r($correctans);
    /*   $keys=array_keys($input);
    if ($i=0) {
    echo $keys[$i];
    echo "<br>";
    }
    
    foreach($input[$keys[$i]] as $key => $value){
    echo $key.":" .$value."<br>";
    }
    echo "<br>";*/

    foreach ($input as $key => $value) {
        echo "<br>";
        echo $key;

        foreach ($value as $v => $k) {
            echo "<br>";
            echo $v;
            echo $k;
            /*    foreach($k as $m){
            echo "<br>";
            echo $m;
            echo $k;
            }*/
        }
    }
    





} else if (isset($_POST['btn_submit'])) {
   
    
    header('Location: /assessment4b.php');
    
    echo "<form  method='post' action='welcome3.php'  >";
    
}
?>

