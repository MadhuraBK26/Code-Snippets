<?php
function connectToDb()
{
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=mytodo', 'root', 'compass');
    
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function fetchAllTasks($pdo)
{
    
    
    $statement = $pdo->prepare('select * from MyGuests');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Task');
}
function dd($d)
{
    echo '<pre>';
    die(var_dump($d));
    echo '</pres>';
} 
