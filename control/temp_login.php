<?php
require_once("database_connect.php");

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['password'];

    // Check whether the input is an email or username
    if (filter_var($email_or_username, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = ?";
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
    }

    $stmt = $kunci->prepare($sql);
    $stmt->execute([$email_or_username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    } else {
        // Verify the password
        if (!password_verify($password, $user['password'])) {
            echo "Wrong password.";
        } else {
            // Set session variables using the user's ID instead of ZenID
            $_SESSION['user']['ZenID'] = $user['ZenID'];
            $_SESSION['user']['Username'] = $user['Username'];
            $_SESSION['user']['Email'] = $user['Email'];

            // Redirect to internal page or user dashboard
            header('Location: internal.php');
            exit();
        }
    }
}
?>
