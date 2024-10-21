<?php
$host = 'localhost';
$dbname = 'zentask_db';
$user = 'root';  
$pass = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email_or_username = $_POST['email_or_username'];
        $password = $_POST['password'];

        if (filter_var($email_or_username, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM users WHERE email = :email_or_username";
        } else {
            $sql = "SELECT * FROM users WHERE username = :email_or_username";
        }

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_username', $email_or_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
    
            session_start();
            $_SESSION['user_id'] = $user['id'];

            header("Location: ../page/dashboard.php");
            exit(); 
        } else {
            header("Location: ../page/sign_in.php?error=1");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

