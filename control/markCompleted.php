<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../page/sign_in.php');
    die();
}

require_once('database_connect.php');
$sql = "UPDATE task
        SET Finish = NOW()
        WHERE ZenID = ? AND TaskID = ?";
$stmt = $kunci->prepare($sql);
$stmt->execute([$_SESSION['user']['ZenID'], $_GET['TaskID']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$anchor = "../page/" . $_SESSION['Anchor_Page'];
header("location: ". $anchor);