<?php

$database = require 'bootstrap.php';

$tasks = $database->selectAll('table-that-does-not-exist');

require 'PDO_Refactoring.php';