<?php session_start();
if (isset($_SESSION['user'])) header('location: ./dashboard.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZenTask - Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHqz5aL4tR9nfsQ6N+E6C3zksdjBBfLepI4d2XaFfIho9ebMdbwT5K4p0XokA9EBcPavJwg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
          <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
        rel="stylesheet"
    />
    <style>
        main {
            background-image: url('images/Ellipse 3.png');
            background-position: bottom center;
            background-repeat: no-repeat;
            background-size: auto;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<header class="flex justify-between items-center p-6">
    <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
            <p class="cursor-default">ZenTask</p>
    </div>
    <div>
        <img src="images/user_profile.jpg" alt="User Profile" class="w-12 h-12 rounded-full">
    </div>
</header>

<main class="flex-grow flex flex-col justify-center items-center bg-gray-50 relative">
    <div class="text-center z-10">
        <h1 class="text-4xl font-bold text-black">Plan Your Goals Effortlessly</h1>
        <h2 class="text-2xl text-gray-600 mt-2">with ZenTask ✨</h2>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 mt-6 mb-10 max-w-sm w-full z-10">
        <h3 class="text-2xl font-bold mb-4">Sign In</h3>

        <!-- Display error message if login failed -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="text-red-500 text-sm mb-4">
            Invalid email/username or password.
        </div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="text-green-500 text-sm mb-4">
            Profile updated!
        </div>
        <?php endif; ?>

        <form action="../control/login_controller.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email_or_username">Email or
                    Username</label>
                <input type="text" name="email_or_username" id="email_or_username"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Enter your email or username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Enter your password" required>
            </div>
            <div>
                <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">Log In
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm">Don't have an account? <a href="sign_up.php" class="text-blue-500 hover:text-blue-700">Sign
                    Up</a></p>
        </div>
    </div>
</main>

</body>
</html>