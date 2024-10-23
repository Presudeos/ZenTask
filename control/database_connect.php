<?php
$host = 'localhost';
$dbname = 'zentask_db';
$username = 'root';
$password = 'SQLP@ss98';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

$kunci = new PDO($dsn, $username, $password);


