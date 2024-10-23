<?php
include './database_connect.php';
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = :new_password WHERE email = :email";

        $stmt = $kunci->prepare($sql);
        $stmt->bindParam(':new_password', $hashed_password);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            header("Location: ../page/sign_in.php");
            exit();
        } else {
            echo "Error updating password.";
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
