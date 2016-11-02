<html>
<h2 align="center">Multiple choice questions form</h2>

<form  method="POST" action="assignment6.php?question=<?php
echo $questionanswer[$_GET['question']] + 1;
?> "  >



<?php
$questionanswer = array(
    array(
        'q' => 'what is ur name ?',
        'a' => 'madhu',
        'd' => 'vasu'
    ),
    
    
    array(
        'q' => 'what is ur school name ?',
        'a' => 'venkatramana',
        'd' => 'viveka'
    )
);

$collected_question = $questionanswer[$_GET['question']];
$q = $collected_question['q'];
$ans = $collected_question['a'];
$ans1 = $collected_question['d'];

echo $q;
echo "<br>";
//echo $ans;
//echo $ans1;
//print_r($questionanswer)
?>
<html>
<input type="radio" name="quest" >

<?php
echo $ans;
echo "<br>";
?>

<html>
<input type="radio" name="quest" >
</html>

<?php
echo $ans1;
?>

<input type="submit" name="btn_submit1" value="submit1"> <br><br>
</html>


