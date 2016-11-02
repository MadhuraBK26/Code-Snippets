<?php

/*class Contractor
{
	protected $electrician;

	protected $plumber;
	public function __construct($electrician,$plumber,$designer)
	{
      $this->electrician = $electrician;
      $this->plumber = $plumber;
	}

	public function performWork()
	{


	}
}*/

class QueryBuilder
{
	protected $pdo;

	public function __construct($pdo)
	{
	    $this->pdo = $pdo;
	}
	public function selectAll($table)
	{
	    $statement = $this->pdo->prepare('select * from todos');

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);

	}
}

?>
