<?php
include './database_connect.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            exit();
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Get current timestamp
        $created_at = date('Y-m-d H:i:s');

        // Prepare and execute query
        $sql = "INSERT INTO user (Username, Email, Password, Created_at) 
                VALUES (:username, :email, :password, :created_at)";
        $stmt = $kunci->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':created_at', $created_at);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to sign in page after successful registration
            header("Location: ../page/sign_in.php");
            exit();
        } else {
            echo "Error during registration.";
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
