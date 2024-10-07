<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === 'user@example.com' && $password === 'password123') {
        echo "Login successful!";
    } else {
        echo "Invalid credentials, please try again.";
    }
}
?>
