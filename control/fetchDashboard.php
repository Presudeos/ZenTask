<?php
//session_start();
require_once('database_connect.php');

$ongoing = $kunci->prepare("SELECT * FROM task WHERE ZenID=? AND Finish IS NULL ORDER BY Deadline DESC");
$ongoing->execute([$_SESSION['user']['ZenID']]);

$totalTask =  $kunci->prepare("SELECT COUNT(*) AS C FROM task WHERE ZenID=? GROUP BY ZenID");
$totalTask->execute([$_SESSION['user']['ZenID']]);
$totalTask = $totalTask->fetch(PDO::FETCH_ASSOC);

$taskCompletion = $kunci->prepare("SELECT floor((count(Finish) / count(Finish IS NULL )) * 100) as completion FROM task WHERE ZenID=?");
$taskCompletion->execute([$_SESSION['user']['ZenID']]);
