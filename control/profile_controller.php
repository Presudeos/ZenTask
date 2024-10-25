<?php
session_start();

try {
    // Check if the user is logged in
    if (!isset($_SESSION['user']['ZenID'])) {
        header("Location: ../page/sign_in.php");
        exit();
    }

    $user_id = $_SESSION['user']['ZenID'];

    // Fetch user data based on the ID
    $sql = "SELECT username, email, Created_at FROM users WHERE id = :user_id";
    $stmt = $kunci->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    }

    $username = $user['username'];
    $email = $user['email'];
    $date_joined = date('d F Y', strtotime($user['Created_at'])); 

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>