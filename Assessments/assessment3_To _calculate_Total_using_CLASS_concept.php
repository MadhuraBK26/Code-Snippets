<?php
require 'assessment2a.php';

class Calculator
{
    public $english;
    public $kannada;
    public $hindi;
    public $maths;
    public $science;
    public $total;

    public function add()
    {
        
        if (isset($_POST['btn_submit'])) {
            
            $english = $_POST['num1'];
            $kannada = $_POST['num2'];
            $hindi   = $_POST['num3'];
            $maths   = $_POST['num4'];
            $science = $_POST['num5'];
            $total   = $_POST['total'];
            $total   = $english + $kannada + $hindi + $maths + $science;
            
            if (($_POST['num1'] > 100) || ($_POST['num2'] > 100) || ($_POST['num3'] > 100) || ($_POST['num4'] > 100) || ($_POST['num5'] > 100)) {
                        echo "Subject marks cannot be greater than 100";
                
            } else if (($_POST['num1'] < 0) || ($_POST['num2'] < 0) || ($_POST['num3'] < 0) || ($_POST['num4'] < 0) || ($_POST['num5'] < 0))   {
                        echo "Subject marks cannot be negative";
                
            } else {
                $total = $english + $kannada + $hindi + $maths + $science;
                return $total;
                
            }
        }
    }
}

$total = new Calculator();
echo "<p>The total value is: " . $total->add() . " </p>";
