 <?php

$input = array(
    'What is the colour of hibiscus flower' => array(
        'red' => array(
            'Single petal',
            'Two petals'
        )
    ),
    'What is the breed of your pet dog' => array(
        'Germanshephard' => array(
            'Black',
            'White'
        )
    )
);
print_r($input);

//var_dump(print_r($input));
//$keys=array_keys($input);
//print_r($keys);
//$values=array_values($input);
//print_r($values);

/*  for($i=0;$i<count($input);$i++){
echo $keys[$i];

for($j=0;$j<count($input[$keys[$i]]);$j++){
echo $values[$keys[$i]][$j];
echo "<br>";
}*/

echo "<br>";
foreach ($input as $key => $value) {
    echo "<br>";
    echo $key;

    foreach ($value as $k => $v) {
        echo "<br>";
        echo $k;
        
        foreach ($v as $m) {
            echo "<br>";
            echo $m;
            
        }
        
    }
}

echo "<br>";

?> 
