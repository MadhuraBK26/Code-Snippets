<?php
class Car
{
    // The $model property has a default value of "N/A"
    private $model = "NA";
    
    
    public function __construct($model = null)
    {
    
        if ($model) {
            $this->model = $model;
        }
    }
    
    public function getCarModel()
    {
        return ' The car model is: ' . $this->model;
    }
}

//Creation of the new Car object without passing a value to the model
$car1 = new Car();
echo $car1->getCarModel();
?>
