<?php
error_reporting(1);
print_r($_GET);

if (isset($_GET['question'])) {
    $input = $_GET['question'];
    echo $input;

} else {
    $input = 1;
}

<<<<<<< HEAD

echo $input;

$question1 = array(
    
    
    array(

echo $input;
$question1 = array(
    
    
    array(
>>>>>>> 8b5a8341bf9a88403d89645f1293fe76e2bcfca3
        'question_text' => '1.Which of the following is not a type of constructor',
        'answer_text' => '(1)Parametrized constructor',
        'correct_answer' => false,
        'ans_text' => '(2)Friend constructor',
        'cor_answer' => true,
        'answer_txt' => '(3)Default constructor',
        'crct_answer' => false
    ),
    
    array(
        'question_text' => '2.Which of the following type of class allows only one object of it to be created?',
        'answer_text' => '(1)Abstract class',
        'correct_answer' => false,
        'ans_text' => '(2)Singleton class',
        'cor_answer' => true,
        'answer_txt' => '(3)Friend class',
        'crct_answer' => false
    )
    
);
//print_r($question1);
?>
<html>
<h2 align="center">Multiple choice questions form</h2>
<form  method="POST" action="a10.php?question=<?php
echo $input + 1;
?>">



<?php
$collected_question = $question1[$input];
//$collected_question=$question1[$_GET['answer']];

$question_text  = $collected_question['question_text'];
$answer_text    = $collected_question['answer_text'];
$ans_text       = $collected_question['ans_text'];
$answer_txt     = $collected_question['answer_txt'];
$correct_answer = $collected_question['correct_answer'];
$cor_answer     = $collected_question['cor_answer'];
$crct_answer    = $collected_question['crct_answer'];

//echo $answer_text;
echo $question_text;
echo "<br>";
?>



<input type="radio" name="quest" >

<?php
echo $answer_text;
echo "<br>";

?>
<input type="radio" name="quest" >
<?php
echo $ans_text;
echo $cor_answer;
echo "<br>";
?>

<input type="radio" name="quest" >

<?php
echo $answer_txt;
echo "<br>";
echo $correct_answer;
echo $crct_answer;
?>

<input type="submit" name="btn_submit" value="submit"> <br><br>
</form>
</html>

