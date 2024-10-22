<?php
session_start();

if(!isset($_SESSION['ZenID'])){
    header('location: ../page/sign_in.php'); //
    die();
}

require_once('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formattedDate = DateTime::createFromFormat('Y-m-d', $_POST['date'])->format('Y-m-d');

    $DeadlineInput = $formattedDate . ' ' . $_POST['time'];
    $DeadlineObj = DateTime::createFromFormat('Y-m-d H:i', $DeadlineInput);
    $formattedDeadline = $DeadlineObj->format('Y-m-d H:i:s');
    $sql = "INSERT INTO Task (ZenID, Title, Description, Deadline)
            VALUES (?, ?, ?, ?)";
    $stmt = $kunci->prepare($sql);
    $stmt->execute(params: [$_SESSION['ZenID'], $_POST['title'], $_POST['description'], $formattedDeadline]);
    $sql = "UPDATE Dashboard
            SET TaskCreated = TaskCreated + 1
            WHERE ZenID = ?";
    $stmt = $kunci->prepare($sql);
    $stmt->execute([$_SESSION['ZenID']]);
    
    $anchor = "../page/" . $_SESSION['Anchor_Page']; //
    header("location: ". $anchor);
}