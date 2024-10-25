<?php
session_start();
include './database_connect.php';
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldPassword = $_POST['oldpassword'];
        $new_password = $_POST['newpassword'];
        $confirm_password = $_POST['confirm-password'];

        if(!password_verify($oldPassword, $_SESSION['user']['Password'])){
            header('Location: ../page/profile.php?oldPassErr=1');
        }
        elseif ($new_password !== $confirm_password) {
            header("location: /page/profile.php?passwordErr=1");
            exit;
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $sql = "UPDATE user SET Password = :new_password WHERE Email = :email";

            $stmt = $kunci->prepare($sql);
            $stmt->bindParam(':new_password', $hashed_password);
            $stmt->bindParam(':email', $_SESSION['user']['Email']);

            if ($stmt->execute()) {
                header("Location: /page/profile.php?passwordSuccess=1");
                exit();
            } else {
                echo "Error updating password.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>