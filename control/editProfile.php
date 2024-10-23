<?php

session_start();

include './database_connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $currentEmail = $_SESSION['user']['Email'];
    $currentUsername = $_SESSION['user']['Username'];
    $id = $_SESSION['user']['ZenID'];

    if (empty($username) && empty($email)) header('location: ../page/profile.php?null=1');

    try {
        // Cek apakah username atau email sudah digunakan oleh pengguna lain (kecuali yang sedang login)
        if ($username == $currentUsername) {
            $query = "SELECT * FROM user WHERE email = ? AND ZenID != ?";
            $statement = $kunci->prepare($query);
            $statement->execute([$email, $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } else if ($email == $currentEmail) {
            $query = "SELECT * FROM user WHERE username = ? AND ZenID != ?";
            $statement = $kunci->prepare($query);
            $statement->execute([$username, $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }

        if ($result) {
            // Jika ada duplikasi username atau email
            $_SESSION['error'] = "Username atau Email sudah digunakan. Silakan coba yang lain!";
            header("Location: /user/profile.php");
            exit();  // Jangan lupa exit setelah header
        } else {
            // Lanjutkan update jika tidak ada duplikasi
            $updateQuery = "UPDATE user SET Username = ?, Email = ? WHERE ZenID = ?";
            $updateStatement = $kunci->prepare($updateQuery);
            $updateStatement->execute([$username, $email, $id]);

            // Update session email jika berhasil mengubah email
            if ($updateStatement->rowCount() > 0) {  // Cek jika ada perubahan data
                $_SESSION['user']['Email'] = $email;
                $_SESSION['user']['Username'] = $username;

                header("Location: /page/profile.php?success=1");
                exit();  // Jangan lupa exit setelah header
            } else {
                header("Location: /page/profile.php?error=1");
                exit();  // Jangan lupa exit setelah header
            }
        }
    } catch (PDOException $e) {
        // Tangani error PDO
        echo "Error: " . $e->getMessage();
    }
}
