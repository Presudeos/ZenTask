<?php
session_start();

if(!isset($_SESSION['user']['ZenID'])){
    header('location: ../page/sign_in.php');
    die();
}

require_once('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $TaskID = (int)$_POST['id'];

    $sql = "DELETE FROM task WHERE ZenID = ? AND TaskID = ?";
    $stmt = $kunci->prepare($sql);
    $stmt->execute([$_SESSION['user']['ZenID'], $TaskID]);

    $anchor = "../page/" . $_SESSION['Anchor_Page'];
    header("location: ". $anchor);
}
