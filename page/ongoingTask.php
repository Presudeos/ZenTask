<!-- Responsive -->

<?php
session_start();
if(!isset($_SESSION['user'])) header('location: ./sign_in.php');
require_once("../control/fetchOngoingTask.php");
$_SESSION['Anchor_Page'] = "ongoingTask.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Task - ZenTask</title>
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
            <form id="search" action="ongoingTask.php">
                <input
                        class="w-full h-12 bg-transparent font-[Roboto] text-base px-1 outline-none"
                        name="search"
                        placeholder="Search your task"
                        value="<?php if (isset($_GET['search'])) echo($_GET['search']) ?>"
                ></input>
            </form>
        </div>

        <!-- Add task button -->
        <div class="flex w-full h-auto justify-center items-center md:justify-between flex-col md:flex-row gap-y-3">
            <p class="font-[Poppins] font-bold text-xl">All your tasks:</p>
            <button class="button1 addtask" type="button">
                <span class="button1__text font-[Roboto] font-bold text-base addtask">Add Task</span>
                <span class="button1__icon addtask"><svg class="svg addtask" fill="none" height="24"
                                                         stroke="currentColor" stroke-linecap="round"
                                                         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                         width="24" xmlns="http://www.w3.org/2000/svg"><line
                                class="addtask" x1="12" x2="12" y1="5" y2="19"></line><line class="addtask" x1="5"
                                                                                            x2="19" y1="12"
                                                                                            y2="12"></line></svg></span>
            </button>
        </div>
        <!-- Task List -->
        <ul class="text-base mt-3 md:mt-2">
            <p class="py-2">Ongoing:</p>
            <?php for ($x = 0; $x < $i; $x++) { ?>
                <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4">
                    <div class="content-container flex flex-row w-full items-center justify-between h-full">
                        <form action="../control/markCompleted.php?TaskID=<?= $ongoing[$x]['TaskID'] ?>" method="POST">
                            <input type="checkbox" id="list-<?= $x ?>" class="cbx" style="display: none;">
                            <label for="list-<?= $x ?>" class="check m-0 cb">
                                <svg width="18px" height="18px" viewBox="0 0 18 18" class="cb">
                                    <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                            </label>
                        </form>
                        <p class="title ml-4 cursor-pointer"><?= $ongoing[$x]['Title'] ?></p>
                        <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto"><?= convertDate($ongoing[$x]['Deadline']) ?></p>
                    </div>
                    <div class="description-div ml-9 cursor-default">
                        <p><?= $ongoing[$x]['Description'] ?></p>
                        <div class="flex flex-row justify-end edit-container">
                            <button
                                    class="w-auto h-auto px-3 py-1 rounded-md edit-box add"
                                    data-task-id="<?= $ongoing[$x]['TaskID'] ?>"
                                    data-task-title="<?= $ongoing[$x]['Title'] ?>"
                                    data-task-description="<?= $ongoing[$x]['Description'] ?>"
                                    data-task-deadline="<?= $ongoing[$x]['Deadline'] ?>">
                                <img class="w-5 edit-box" src="./images/edit.svg"></img>
                            </button>
                            <button
                                    class="w-auto h-auto px-3 py-1 rounded-md delete-box delete"
                                    data-task-id="<?= $ongoing[$x]['TaskID'] ?>">
                                <img class="w-5 delete-box" data-task-id="<?= $ongoing[$x]['TaskID'] ?>"
                                     src="./images/delete.svg"></img>
                            </button>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<!-- Modal: Add Task -->
<div class="modal-container-addtask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
    <form action="../control/addTask.php" method="POST"
          class="modal-addtask w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
        <p class="font-bold place-self-center">Add Task</p>
        <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
            <label>Title</label>
            <input required class="h-10 p-3 border rounded-md w-full" name="title" placeholder="Input task title"/>
        </div>
        <div class="flex flex-col mb-3 text-sm gap-y-1">
            <label>Description</label>
            <textarea required class="h-20 p-3 border rounded-md w-full" name="description"
                      placeholder="Input task description"></textarea>
        </div>
        <div class="flex flex-col mb-3 text-sm gap-y-1">
            <label>Deadline</label>
            <div class="flex flex-col md:flex-row justify-between gap-4 w-full">
                <!-- Set consistent width for date and time inputs on larger screens -->
                <input required type="date" class="h-10 p-3 border rounded-md w-full md:w-1/2" name="date"
                       placeholder="Date"/>
                <input required type="time" class="h-10 p-3 border rounded-md w-full md:w-1/2" name="time"
                       placeholder="Time" value="00:00"/>
            </div>
        </div>

        <div class="flex flex-row mt-4 justify-between">
            <button class="cancelform-addtask w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
            <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white cursor-pointer">
        </div>
    </form>
</div>

<!-- Modal: Edit Task -->
<div class="modal-container-edittask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
    <form action="../control/editTask.php" method="POST"
          class="modal-edittask w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
        <p class="font-bold place-self-center">Edit Task</p>
        <input name="id" type="number" hidden/>
        <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
            <label>Title</label>
            <input required class="h-10 p-3 border rounded-md w-full" name="title" placeholder="Input task title"/>
        </div>
        <div class="flex flex-col mb-3 text-sm gap-y-1">
            <label>Description</label>
            <textarea required class="h-20 p-3 border rounded-md w-full" name="description"
                      placeholder="Input task description"></textarea>
        </div>
        <div class="flex flex-col mb-3 text-sm gap-y-1">
            <label>Deadline</label>
            <div class="flex flex-col md:flex-row justify-between gap-4 w-full">
                <!-- Set consistent width for date and time inputs on larger screens -->
                <input type="date" required class="h-10 p-3 border rounded-md w-full md:w-1/2" name="date"
                       placeholder="Date"/>
                <input type="time" required class="h-10 p-3 border rounded-md w-full md:w-1/2" name="time"
                       placeholder="Time" value="00:00"/>
            </div>
        </div>

        <div class="flex flex-row mt-4 justify-between">
            <button type="button" class="cancelform-edittask w-28 h-8 rounded-md bg-gray-400 text-md text-white">
                Cancel
            </button>
            <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white cursor-pointer">
        </div>
    </form>
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
</body>

<script>
    $(document).ready(function () {
        // Meng-handle klik pada checkbox di dalam li
        $('input[type="checkbox"]').on('click', function (e) {
            if($(this).attr('id') == 'burger') return;
            e.stopPropagation();

            var $checkbox = $(this);
            $checkbox.attr("disabled", true);
            var $listItem = $checkbox.closest('.list-container');

            // Menambahkan kelas "remove"
            $listItem.addClass("remove");

            // Menggunakan setTimeout untuk menunggu 2 detik, kemudian menambahkan class hidden dan menghapus elemen
            setTimeout(function () {
                $checkbox.closest('form').submit();
            }, 1000);
            setTimeout(function () {
                $listItem.addClass("hidden"); // Menambahkan class hidden
                $listItem.remove(); // Menghapus elemen setelah 2 detik
            }, 2000); // 2000 ms = 2 detik

        });

        // Meng-handle klik pada list item (li) atau elemen di dalamnya
        $('li').on('click', function (e) {
            if ($(e.target).hasClass('cb') || $(e.target).hasClass('edit-box') || $(e.target).hasClass('delete-box')) return;
            console.log(e.target);
            var $clickedList = $(this);
            var $descriptionDiv = $clickedList.find('.description-div');

            $('.description-div.expand').not($descriptionDiv).removeClass('expand');
            $descriptionDiv.toggleClass('expand');
        });

        // Meng-handle klik pada add task button
        $('.addtask').on('click', function (e) {
            console.log(e.target);
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-addtask');
            var $blurContainer = $clicked.find('.bgblur');

            $descriptionDiv.removeClass('hidden');
            $blurContainer.addClass('blur');
        });

        // Meng-handle klik pada edit task button
        $('.edit-box').on('click', function (e) {
            console.log(e.target);
            var $clicked = $(this);

            // Ambil data dari tombol edit yang diklik
            var taskId = $clicked.data('task-id');
            var taskTitle = $clicked.data('task-title');
            var taskDescription = $clicked.data('task-description');
            var taskDeadline = $clicked.data('task-deadline');

            // Pisahkan deadline menjadi tanggal dan waktu
            var deadlineDate = taskDeadline.split(' ')[0];  // Mengambil bagian tanggal
            var deadlineTime = taskDeadline.split(' ')[1];  // Mengambil bagian waktu

            // Isi modal form edit dengan data task
            $('input[name="id"]').val(taskId);
            $('input[name="title"]').val(taskTitle);
            $('textarea[name="description"]').val(taskDescription);
            $('input[name="day"]').val(deadlineDate);  // Bagian tanggal
            $('input[name="time"]').val(deadlineTime);  // Bagian waktu

            // Tampilkan modal edit
            var $descriptionDiv = $(document).find('.modal-container-edittask');
            var $blurContainer = $(document).find('.bgblur');

            $descriptionDiv.removeClass('hidden');
            $blurContainer.addClass('blur');
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

        // Meng-handle klik pada cancel form Add Task
        $('.cancelform-addtask').on('click', function (e) {
            console.log(e.target);
            e.preventDefault();
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-addtask');
            var $blurContainer = $clicked.find('.bgblur');

            $clicked.find('form')[0].reset();

            $descriptionDiv.addClass('hidden');
            $blurContainer.removeClass('blur');
        });

        // Meng-handle klik pada cancel form Edit Task
        $('.cancelform-edittask').on('click', function (e) {
            console.log(e.target);
            e.preventDefault();
            var $clicked = $(document);
            var $descriptionDiv = $clicked.find('.modal-container-edittask');
            var $blurContainer = $clicked.find('.bgblur');

            $('input[name="id"]').val("");
            $('input[name="title"]').val("");
            $('textarea[name="description"]').val("");
            $('input[name="day"]').val("");  // Bagian tanggal
            $('input[name="time"]').val("00:00");  // Bagian waktu

            console.log($clicked.find('form')[1]);

            $clicked.find('form')[1].reset();

            $descriptionDiv.addClass('hidden');
            $blurContainer.removeClass('blur');
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

        $('#search').on('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Mencegah form di-submit secara default
                $('#search').submit(); // Submit form secara manual
            }
        });

    });
</script>


</html>
