<?php

$config = require 'Passwd_linkedfile1.php';

require 'Refactoring_linkedfile4.php';

require 'Refactoring_linkedfile2.php';

//$pdo = Connection::make();

return new QueryBuilder(

	Connection::make($config['database'])

);
