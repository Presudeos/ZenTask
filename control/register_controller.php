<?php
$host = 'localhost';
$dbname = 'zentask_db';
$user = 'root';  
$pass = '';    

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $created_at = date('Y-m-d H:i:s');

        $zenid = 'ZEN' . rand(10000, 99999);

        $sql = "INSERT INTO users (username, email, password, created_at, zenid) 
                VALUES (:username, :email, :password, :created_at, :zenid)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':zenid', $zenid);

        if ($stmt->execute()) {
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
