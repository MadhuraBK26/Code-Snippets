<?php
$database = require 'Refactoring_linkedfile3.php';


$pdo = connection::make();

$query = new QueryBuilder($pdo);

$tasks = $query->selectAll('todos');

//$tasks = fetchAllTasks($pdo);

$tasks = array_map(function($task)
{
    return new Task();
    
}, $tasks);

die(var_dump($tasks));

require 'PDO_linkedfile1.php'; 

