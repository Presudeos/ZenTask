<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZenTask - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <header class="flex justify-between items-center p-6 bg-white shadow-md">
        <div class="text-4xl font-bold text-black">
            ZenTask
        </div>
        <div class="text-gray-500">
            <i class="fas fa-user-circle text-3xl"></i>
        </div>
    </header>

    <main class="flex flex-col justify-center items-center h-screen">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-black">Plan Your Goals Effortlessly</h1>
            <h2 class="text-2xl text-gray-600 mt-2">with ZenTask ✨</h2>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8 mt-8 max-w-sm w-full">
            <h3 class="text-2xl font-bold mb-4">Sign In</h3>
            <form action="login.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" required>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700 text-sm">Forgot your password?</a>
                    <a href="#" class="text-blue-500 hover:text-blue-700 text-sm">Account Recovery</a>
                </div>
                <div>
                    <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">Log In</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm">Don't have an account? <a href="register.php" class="text-blue-500 hover:text-blue-700">Sign Up</a></p>
            </div>
        </div>
    </main>

</body>
</html>
