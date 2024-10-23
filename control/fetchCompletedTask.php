<?php
//session_start();

if(!isset($_SESSION['user'])){
    header('location: ../page/sign_in.php');
    die();
}

require_once('database_connect.php');

// ================= ALL TASK ========================
$j = 0;

if (isset($_GET['search']) && !empty($_GET['search'])){
    $sql = "SELECT TaskID, Title, Description, Deadline, Finish
            FROM task
            WHERE ZenID = ? AND Title LIKE ? AND Finish IS NOT NULL
            ORDER BY Deadline ASC";
    $stmt = $kunci->prepare($sql);
    $stmt->execute([$_SESSION['user']['ZenID'], '%' . $_GET['search'] . '%']);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
else{
    $sql = "SELECT TaskID, Title, Description, Deadline, Finish
            FROM task
            WHERE ZenID = ? AND Finish IS NOT NULL
            ORDER BY Deadline ASC";
    $stmt = $kunci->prepare($sql);
    $stmt->execute([$_SESSION['user']['ZenID']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


while($row){
    $datetime = new DateTime($row['Deadline']);
    $row['Deadline'] = $datetime->format('d/m/Y H:i');
    $finished[$j] = $row;
    $j++;
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

function convertDate($inputDate) {
    // Mengubah string input menjadi timestamp
    $timestamp = DateTime::createFromFormat('d/m/Y H:i', $inputDate);

    if (!$timestamp) {
        return "Format tanggal tidak valid";
    }

    // Ambil tanggal hari ini dan kemarin
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $tommorow = date('Y-m-d', strtotime('+1 day'));

    // Format tanggal dari input untuk dibandingkan dengan hari ini dan kemarin
    $inputFormattedDate = $timestamp->format('Y-m-d');

    // Cek apakah input adalah hari ini
    if ($inputFormattedDate === $today) {
        return "Today, " . $timestamp->format('H.i');
    }
    // Cek apakah input adalah hari kemarin
    elseif ($inputFormattedDate === $yesterday) {
        return "Yesterday, " . $timestamp->format('H.i');
    }
    elseif ($inputFormattedDate === $tommorow) {
        return "Tommorow, " . $timestamp->format('H.i');
    }
    // Jika bukan hari ini atau kemarin, kembalikan tanggal
    else {
        return $timestamp->format('d-m-Y');
    }
}
