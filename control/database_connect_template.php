<?php

// RENAME FILENAMENYA JADI database_connect.php

$host = 'localhost';
$dbname = 'zentask_db';
$username = '';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

$kunci = new PDO($dsn, $username, $password);


