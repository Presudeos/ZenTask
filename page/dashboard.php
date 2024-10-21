<!-- Responsive -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- STYLE -->
     <link rel="stylesheet" href="style.css"/>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body style="background-color:#fafafa">
    <!-- Navigation -->
    <nav class="w-full h-auto py-5 flex items-center px-[20px] md:px-[55px] max-lg:justify-between">
        <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
            <p class="cursor-default">ZenTask</p>
        </div>
        <div class="nav-link basis-1/2 font-[Poppins] font-medium text-lg flex items-center gap-x-[41px] justify-center max-lg:hidden">
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="taskList.php">Tasks</a>
            <a href="ongoingTask.php">Ongoing</a>
            <a href="completedTask.php">Completed</a>
        </div>
        <label class="burger lg:hidden" for="burger">
            <input type="checkbox" id="burger">
                <span></span>
                <span></span>
                <span></span>
        </label>
        <!-- Profile -->
        <div class="profilenav flex flex-row-reverse h-20 items-center basis-1/4 max-lg:hidden max-lg:place-self-end">
            <a href="profile.php">
                <img
                    src="./images/user_profile.jpg"
                    class="cursor-pointer rounded-full object-cover h-12 ml-4"
                    alt="Profile Picture"
                />
            </a>
            <a href="profile.php">
                <p class="cursor-pointer font-[Montserrat] font-light text-md text-right max-[1200px]:hidden">
                    Anggatha Chandra Virya
                </p>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="bgblur">
        <div class="w-4/5 mx-auto md:w-[600px] flex flex-col items-center">
            <h2 class="text-xl font-bold text-center">Welcome, Anggatha! <br> What do you want to do today?</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-6 w-full">
                <!-- Ongoing Tasks -->
                <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                    <h3 class="text-xl font-semibold mb-4">Ongoing Tasks</h3>
                    <div class="flex flex-col mb-3 w-full text-left">
                        <p>Project</p>
                        <p class="text-sm text-gray-600">Yesterday, 23.59</p>
                    </div>
                    <div class="flex flex-col mb-3 w-full text-left">
                        <p>Project</p>
                        <p class="text-sm text-gray-600">Yesterday, 23.59</p>
                    </div>
                    <a href="#" class="text-blue-600 mt-4 underline self-end">Ongoing Task</a>
                </div>

                <div class="flex flex-col gap-4">
                    <!-- Total Task Created -->
                    <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                        <h3 class="text-xl font-semibold mb-3">Total Task Created</h3>
                        <h1 class="text-4xl font-bold">72</h1>
                    </div>
                    <!-- Task Completion -->
                    <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                        <h3 class="text-xl font-semibold mb-3">Task Completion</h3>
                        <h1 class="text-4xl font-bold mb-1">80%</h1>
                        <div class="w-full bg-gray-300 rounded-full h-2.5 mt-2">
                            <div class="bg-green-500 h-2.5 rounded-full" style="width: 80%;"></div>
                        </div>
                        <a href="#" class="text-blue-600 mt-4 underline self-end">Completed Task</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
