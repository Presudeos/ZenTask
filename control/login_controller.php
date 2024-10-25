<?php
include './database_connect.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email_or_username = $_POST['email_or_username'];
        $password = $_POST['password'];

        if (filter_var($email_or_username, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM user WHERE Email = :email_or_username";
        } else {
            $sql = "SELECT * FROM user WHERE Username = :email_or_username";
        }

        $stmt = $kunci->prepare($sql);
        $stmt->bindParam(':email_or_username', $email_or_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['Password'])) {

            session_start();
            $_SESSION['user'] = $user;

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

