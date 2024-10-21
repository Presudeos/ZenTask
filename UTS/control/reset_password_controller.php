<?php
$host = 'localhost';
$dbname = 'zentask_db';
$user = 'root';  
$pass = '';    

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

        $stmt = $pdo->prepare($sql);
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
