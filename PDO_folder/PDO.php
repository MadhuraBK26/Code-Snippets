 <?php
require 'PDO_linkedfile2.php';

require 'PDO_linkedfile3.php';

$pdo = connectToDb();

$tasks = fetchAllTasks($pdo);

/*function fetchAllTasks($pdo)
{
    $statement = $pdo->prepare('select * from todos');

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS,'Task');


}

function connectToDb()
{
   try {

        return new PDO('mysql:host=127.0.0.1;dbname=mytodo','root','compass');

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}*/

require 'PDOlinkedfile1.php'; 
