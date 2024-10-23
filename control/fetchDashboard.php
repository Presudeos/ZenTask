<?php
session_start();

require_once('database_connect.php');

$ongoing = $kunci->prepare("SELECT * FROM task ORDER BY Deadline DESC");
$ongoing->execute();

$taskCompletion = $kunci->prepare("SELECT floor((count(Finish) / count(Finish IS NULL )) * 100) as completion FROM task");
$taskCompletion->execute();