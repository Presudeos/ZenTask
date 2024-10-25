<?php

// RENAME FILENAMENYA JADI database_connect.php

$host = 'localhost';
$dbname = 'u571101154_zentask_lab';
$username = 'u571101154_zentask_lab';
$password = 'Grizzcraft7705';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

$kunci = new PDO($dsn, $username, $password);


