<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['user']['ZenID'])){
    header('location: ../page/sign_in.php'); //
    die();
}


require_once('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "DELETE FROM task
            WHERE ZenID = ? AND Finish IS NOT NULL";
    $stmt = $kunci->prepare($sql);
    $stmt->execute(params: [$_SESSION['user']['ZenID']]);
    $anchor = "../page/" . $_SESSION['Anchor_Page']; //
    header("location: ". $anchor);
}