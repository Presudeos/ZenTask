<?php
//Sekalian login

require_once("database_connect.php");

session_start(); //TEMPORARY
$username = 'example';
$password = 'example';

$sql = "SELECT * FROM user
        WHERE username = ?";

$stmt = $kunci->prepare($sql);
$stmt->execute([$username]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row){
    echo "User not found";
}else{
    echo "USERNAME ada di database<br/>";
    echo "Password yang di input di form login: " . $row['Username'];
    echo "<br/>Password yang tersimpan di database: " . $row['Password'];
    if (!password_verify($password, $row['Password'])){
        echo "Wrong password";
    }else{
        
        $_SESSION['ZenID'] = $row['ZenID'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Picture'] = $row['Picture'];
        //header('location: internal.php');
    }
}