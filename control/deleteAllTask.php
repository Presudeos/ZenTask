<?php
session_start();

if(!isset($_SESSION['user']['ZenID'])){
    header('location: ../page/sign_in.php'); //
    die();
}


require_once('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "DELETE FROM Task
            WHERE ZenID = ? AND Finish IS NOT NULL";
    $stmt = $kunci->prepare($sql);
    $stmt->execute(params: [$_SESSION['user']['ZenID']]);
    $anchor = "../page/" . $_SESSION['Anchor_Page']; //
    header("location: ". $anchor);
}