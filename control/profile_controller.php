<?php
session_start();

$host = 'localhost';
$dbname = 'zentask_db';
$user = 'root';  
$pass = '';    

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../page/sign_in.php");
        exit();
    }

    $user_id = $_SESSION['user_id']; 

    $sql = "SELECT username, email, created_at, zenid FROM users WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    }

    $username = $user['username'];
    $email = $user['email'];
    $date_joined = date('d F Y', strtotime($user['created_at'])); 
    $zenid = $user['zenid'];

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
