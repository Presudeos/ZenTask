<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../page/sign_in.php');
    die();
}

require_once('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $TaskID = (int)$_POST['id'];
    $formattedDate = DateTime::createFromFormat('Y-m-d', $_POST['date'])->format('Y-m-d');
    $DeadlineInput = $formattedDate . ' ' . $_POST['time'];
    $DeadlineObj = DateTime::createFromFormat('Y-m-d H:i', $DeadlineInput);
    $formattedDeadline = $DeadlineObj->format('Y-m-d H:i:s');

    $sql = "UPDATE task
            SET Title = ?, Description = ?, Deadline = ?
            WHERE ZenID = ? AND TaskID = ?";
    $stmt = $kunci->prepare($sql);
    $stmt->execute(params: [$_POST['title'], $_POST['description'], $formattedDeadline, $_SESSION['user']['ZenID'], $TaskID]);
    $anchor = "../page/" . $_SESSION['Anchor_Page'];
    header("location: ". $anchor);
}