<?php
session_start();
if (!isset($_SESSION['user'])) header('location: ./sign_in.php');
$_SESSION['Anchor_Page'] = "dashboard.php";
include '../control/fetchDashboard.php';
$completion =(int) ($taskCompletion->fetch(PDO::FETCH_ASSOC))['completion'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ZenTask</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
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
<?php include '../components/navbar.php'; ?>

<!-- Main Content -->
<div class="bgblur">
    <div class="w-4/5 mx-auto md:w-[600px] flex flex-col items-center">
        <h2 class="text-xl font-bold text-center">Welcome, <?= $_SESSION['user']['Username'] ?>! <br> What do you want
            to do today?</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-6 w-full">
            <!-- Ongoing Tasks -->
            <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                <h3 class="text-xl font-semibold mb-4">Ongoing Tasks</h3>
                <?php while ($data = $ongoing->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="flex flex-col mb-3 w-full text-left">
                        <p><?= $data['Title'] ?></p>
                        <p class="text-sm text-gray-600"><?= $data['Deadline'] ?></p>
                    </div>
                <?php endwhile; ?>
                <a href="ongoingTask.php" class="text-blue-600 mt-4 underline self-end">Ongoing Task</a>
            </div>

            <div class="flex flex-col gap-4">
                <!-- Total Task Created -->
                <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                    <h3 class="text-xl font-semibold mb-3">Total Task Created</h3>
                    <h1 class="text-4xl font-bold"><?= $totalTask['C'] ?></h1>
                </div>
                <!-- Task Completion -->
                <div class="bg-orange-100 px-6 py-6 rounded-lg flex flex-col justify-center items-center">
                    <h3 class="text-xl font-semibold mb-3">Task Completion</h3>
                    <h1 class="text-4xl font-bold mb-1"><?= $completion; ?>
                        %</h1>
                    <div class="w-full bg-gray-300 rounded-full h-2.5 mt-2">
                        <div class="bg-green-500 h-2.5 rounded-full"
                             style="width: <?= $completion; ?>%;"></div>
                    </div>
                    <a href="completedTask.php" class="text-blue-600 mt-4 underline self-end">Completed Task</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
