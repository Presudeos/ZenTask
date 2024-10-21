<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZenTask - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHqz5aL4tR9nfsQ6N+E6C3zksdjBBfLepI4d2XaFfIho9ebMdbwT5K4p0XokA9EBcPavJwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="text-4xl font-bold text-black">
            ZenTask
        </div>
        <div>
            <img src="images/user_profile.jpg" alt="User Profile" class="w-12 h-12 rounded-full">
        </div>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center bg-gray-50 relative">
        <div class="text-center z-10 mb-12">
            <h1 class="text-4xl font-bold text-black">Reset Your Password</h1>
            <p class="text-gray-600 mt-2">Enter your email and new password.</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full z-10">
            <form action="../control/reset_password_controller.php" method="POST">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter new password" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm new password" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">Update Password</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
