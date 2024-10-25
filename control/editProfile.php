<?php

session_start();

include './database_connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pictureTmp = $_FILES['picture']['tmp_name'];
    $pictureName = $_FILES['picture']['name'];

    $currentEmail = $_SESSION['user']['Email'];
    $currentUsername = $_SESSION['user']['Username'];

    $id = $_SESSION['user']['ZenID'];

    if (empty($username) && empty($email)) header(header: 'location: ../page/profile.php?null=1');

    try {
        if ($username == $currentUsername) { //username sama
            if($email == $currentEmail){ //username & email sama
                //gausah cek
                $result = false;
            } else{ //username sama, email beda
                //cek
                $query = "SELECT * FROM user WHERE email = ? AND ZenID != ?";
                $statement = $kunci->prepare($query);
                $statement->execute([$email, $id]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            }
        } else if ($email == $currentEmail) { //username beda, email sama
            //cek
            $query = "SELECT * FROM user WHERE username = ? AND ZenID != ?";
            $statement = $kunci->prepare($query);
            $statement->execute([$username, $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        else{ //username beda, email beda
            //cek
            $query = "SELECT * FROM user WHERE (username = ? OR email = ?) AND ZenID != ?";
            $statement = $kunci->prepare($query);
            $statement->execute([$username, $email, $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            
        }

        if ($result) {
            // Jika ada duplikasi username atau email
            header("Location: ../page/profile.php?error=1");
            exit();  // Jangan lupa exit setelah header
        } else {
            if($pictureTmp != "") {
                if($_SESSION['user']['Picture']) {
                    unlink("../page/images/profile/{$_SESSION['user']['Picture']}");
                }
                move_uploaded_file($pictureTmp, "../page/images/profile/{$_FILES['picture']['name']}");
            }

            // Lanjutkan update jika tidak ada duplikasi
            $updateQuery = "UPDATE user SET Username = ?, Email = ?, Picture = ? WHERE ZenID = ?";
            $updateStatement = $kunci->prepare($updateQuery);
            $updateStatement->execute([$username, $email, $pictureName != "" ? $pictureName : $_SESSION['user']['Picture'], $id]);

            // Update session email jika berhasil mengubah email
            if ($updateStatement) {  // Cek jika ada perubahan data
                $_SESSION['user']['Email'] = $email;
                $_SESSION['user']['Username'] = $username;
                $_SESSION['user']['Picture'] = $pictureName != "" ? $pictureName : $_SESSION['user']['Picture'];

                header("Location: ../page/profile.php?success=1");
                exit();  // Jangan lupa exit setelah header
            } else {
                header("Location: ../page/profile.php?null=1");
                exit();  // Jangan lupa exit setelah header
            }
        }
    } catch (PDOException $e) {
        // Tangani error PDO
        echo "Error: " . $e->getMessage();
    }
}