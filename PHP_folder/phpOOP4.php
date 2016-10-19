<?php
class User
{
    protected $firstName;
    protected $secondName;
    public function hello()
    {
        
        return "First name" . $this->firstName;
        return "second name:" . $this->secondName;
    }
}
$obj1 = new User();
$obj2 = new User();

$obj1->firstName = "Vasundhara";
$obj1->secondName = "BK";

echo $obj1->hello();
?>


