<!-- Responsive -->

<?php
session_start();
if(!isset($_SESSION['user'])) header('location: ./sign_in.php');
require_once("../control/fetchCompletedTask.php");
$_SESSION['Anchor_Page'] = "completedTask.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Task - ZenTask</title>
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
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap"
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

<div class="bgblur">
    <div class="w-11/12 md:w-[600px] mx-auto">
        <!-- Searchbar -->
        <div class="searchbar w-full h-12 mt-3 mb-5 flex wrap">
            <div class="searchbar-icon-box h-12 w-10 flex justify-left items-center shrink-0">
                <img class="pt-1 w-6" src="./images/searchicon.svg"></img>
            </div>
            <form id="search" action="completedTask.php">
                <input
                        class="w-full h-12 bg-transparent font-[Roboto] text-base px-1 outline-none"
                        name="search"
                        placeholder="Search your task"
                        value="<?php if (isset($_GET['search'])) echo($_GET['search']) ?>"
                ></input>
            </form>
        </div>

        <!-- Add task button -->
        <div class="flex w-full h-auto justify-between flex-col-reverse md:flex-row gap-y-3">
            <p class="font-[Poppins] font-bold text-xl">All your tasks:</p>
        </div>

        <!-- Task List -->
        <ul class="text-base mt-3 md:mt-2">
            <p class="py-2">Completed:</p>
            <?php for ($y = 0; $y < $j; $y++) { ?>
                <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4">
                    <div class="content-container flex flex-row w-full items-center justify-between h-full pl-[18px]">
                        <p class="title ml-4 cursor-pointer"><?= $finished[$y]['Title'] ?></p>
                        <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto"><?= convertDate($finished[$y]['Deadline']) ?></p>
                    </div>
                    <div class="description-div ml-9 cursor-default">
                        <p><?= $finished[$y]['Description'] ?></p>
                        <div class="flex flex-row justify-end edit-container">
                            <button
                                    class="w-auto h-auto px-3 py-1 rounded-md delete-box delete"
                                    data-task-id="<?= $finished[$y]['TaskID'] ?>">
                                <img class="w-5 delete-box" data-task-id="<?= $finished[$y]['TaskID'] ?>"
                                     src="./images/delete.svg"></img>
                            </button>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!-- Remove All Completed Task -->
        <div class="w-full flex justify-start order-last mt-4">
            <p class="delete-box-ALL text-blue-500 underline cursor-pointer">Remove All Completed Task</p>
        </div>
    </div>
</div>

<!-- Modal: Delete Task -->
<div class="modal-container-deletetask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
    <form action="../control/deleteTask.php" method="POST"
          class="modal-deletetask w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
        <p class="font-bold place-self-center">Delete Task</p>

        <p class="place-self-center pt-5 pb-3">Are you sure want to delete this task?</p>
        <input name="id" type="number" hidden/>

        <div class="flex flex-row mt-4  justify-between">
            <button type="button" class="cancelform-deletetask w-28 h-8 rounded-md bg-gray-400 text-md text-white">
                Cancel
            </button>
            <input type="submit"
                   class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
        </div>
    </form>
</div>

<!-- Modal: Delete All Tasks -->
<div class="modal-container-deletetaskALL fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
    <form action="../control/deleteAllTask.php" method="POST"
          class="modal-deletetask w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
        <p class="delete-box-ALL font-bold place-self-center">Delete All Tasks</p>
        <p class="place-self-center pt-5 pb-3">Are you sure you want to delete all tasks?</p>
        <div class="flex flex-row mt-4 justify-between">
            <button type="button" class="cancelform-deletetaskALL w-28 h-8 rounded-md bg-gray-400 text-md text-white">
                Cancel
            </button>
            <input type="submit"
                   class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
        </div>
    </form>
</div>
</body>

<script>
    $(document).ready(function () {
        // Meng-handle klik pada list item (li) atau elemen di dalamnya
        $('li').on('click', function (e) {
            if ($(e.target).hasClass('cb') || $(e.target).hasClass('edit-box') || $(e.target).hasClass('delete-box')) return;
            console.log(e.target);
            var $clickedList = $(this);
            var $descriptionDiv = $clickedList.find('.description-div');

            $('.description-div.expand').not($descriptionDiv).removeClass('expand');
            $descriptionDiv.toggleClass('expand');
        });


        // Meng-handle klik pada delete task button
        $('.delete-box').on('click', function (e) {
            console.log(e.target);
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-deletetask');
            var $blurContainer = $clicked.find('.bgblur');
            var taskId = $(this).data('task-id');
            $('input[name="id"]').val(taskId);
            console.log(taskId);

            $descriptionDiv.removeClass('hidden');
            $blurContainer.addClass('blur');
        });

        // Meng-handle klik pada cancel form Delete Task
        $('.cancelform-deletetask').on('click', function (e) {
            console.log(e.target);
            e.preventDefault();
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-deletetask');
            var $blurContainer = $clicked.find('.bgblur');

            console.log($clicked.find('form')[2]);
            $('input[name="id"]').val("");
            $clicked.find('form')[2].reset();


            $descriptionDiv.addClass('hidden');
            $blurContainer.removeClass('blur');
        });

        // Meng-handle klik pada delete all task button
        $('.delete-box-ALL').on('click', function (e) {
            console.log(e.target);
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-deletetaskALL');
            var $blurContainer = $clicked.find('.bgblur');

            $descriptionDiv.removeClass('hidden');
            $blurContainer.addClass('blur');
        });

        // Meng-handle klik pada cancel form Delete All Tasks
        $('.cancelform-deletetaskALL').on('click', function (e) {
            console.log(e.target);
            e.preventDefault();
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-deletetaskALL');
            var $blurContainer = $clicked.find('.bgblur');

            $descriptionDiv.addClass('hidden');
            $blurContainer.removeClass('blur');
        });

        $('#search').on('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Mencegah form di-submit secara default
                $('#search').submit(); // Submit form secara manual
            }
        });
    });
</script>
</html>
