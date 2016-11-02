<?php
require 'assessment2a.php';

class Calculator
{
    public $english, $kannada, $hindi, $maths, $science, $total;
    
    public function __construct($english, $kannada, $maths, $science, $hindi, $total)
    {
        $this->english = $english;
        $this->kannada = $kannada;
        $this->maths   = $maths;
        $this->science = $science;
        $this->hindi   = $hindi;
        $this->total   = $total;
        
    }
    
    public function add()
    {
        if (($_POST['num1'] > 100) || ($_POST['num2'] > 100) || ($_POST['num3'] > 100) || ($_POST['num4'] > 100) || ($_POST['num5'] > 100)) {
            echo "Subject marks cannot be greater than 100";
            
            
        } else if (($_POST['num1'] < 0) || ($_POST['num2'] < 0) || ($_POST['num3'] < 0) || ($_POST['num4'] < 0) || ($_POST['num5'] < 0)) {
            echo "Subject marks cannot be negative";

            
        } else {
            
            return $this->english + $this->kannada + $this->hindi + $this->maths + $this->science;
            echo $total;
        }
    }
}
$calc = new Calculator($_POST['num1'], $_POST['num2'], $_POST['num3'], $_POST['num4'], $_POST['num5']);
echo "<p> The total is:" . $calc->add() . "</p>";
?> 
