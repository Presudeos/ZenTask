<?php
session_start();

if(!isset($_SESSION['ZenID'])){
    header('location: ../page/sign_in.php');
    die();
}

require_once('database_connect.php');



// ================= ONGOING TASK ========================

$taskNumber = 0;
$finishedNumber = 0;
$finishedPercentage;
$i = 0;

$sql = "SELECT TaskID, Title, Description, Deadline, Finish
        FROM task
        WHERE ZenID = ?
        ORDER BY Deadline ASC";
$stmt = $kunci->prepare($sql);
$stmt->execute([$_SESSION['ZenID']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


while($row){
    if($row['Finish'] == NULL && $i < 3){
        $datetime = new DateTime($row['Deadline']);
        $row['Deadline'] = $datetime->format('d/m/Y H:i');

        $ongoing[$i] = $row;
        $i++;
    }
    else if ($row['Finish'] != NULL)
        $finishedNumber++;

    $taskNumber++;


    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($i > 0){
    $finishedPercentage = round($finishedNumber / $taskNumber * 100);
}



// ================= Total Task Created ========================
$sql = "SELECT TaskCreated
        FROM user
        WHERE ZenID = ?";
$stmt = $kunci->prepare($sql);
$stmt->execute([$_SESSION['ZenID']]);
$TaskCreated = ($stmt->fetch(PDO::FETCH_ASSOC))['TaskCreated'];

