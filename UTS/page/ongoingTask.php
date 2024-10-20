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
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
            <a href="dashboard.php">Dashboard</a>
            <a href="taskList.php">Tasks</a>
            <a href="ongoingTask.php" class="active">Ongoing</a>
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
                    alt=""
                ></img>
            </a>
            <a href="profile.php">
                <p class="cursor-pointer font-[Montserrat] font-light text-md text-right max-[1200px]:hidden">
                    Anggatha Chandra Virya
                </p>
            </a>
        </div>
    </nav>

    <div class="bgblur">
    <div class="w-4/5 mx-auto md:w-[600px]">
        <!-- Searchbar -->
        <div class="searchbar w-full h-12 mt-3 mb-5 flex wrap">
        <div class="searchbar-icon-box h-12 w-10 flex justify-left items-center shrink-0">
            <img class="pt-1 w-6" src="./images/searchicon.svg"></img>
        </div>
        <input
            class="w-full h-12 bg-transparent font-[Roboto] text-base px-1 outline-none"
            placeholder="Search your task"
        ></input>
        </div>

        <!-- Add task button -->
         <div class="flex w-full h-auto justify-center items-center md:justify-between flex-col md:flex-row gap-y-3">
            <p class="font-[Poppins] font-bold text-xl">Your ongoing tasks:</p>
            <button class="button1 addtask" type="button">
                <span class="button1__text font-[Roboto] font-bold text-base addtask">Add Task</span>
                <span class="button1__icon addtask"><svg class="svg addtask" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line class="addtask" x1="12" x2="12" y1="5" y2="19"></line><line class="addtask" x1="5" x2="19" y1="12" y2="12"></line></svg></span>
            </button>
         </div>
        <!-- Task List -->
        <ul class="text-base mt-3 md:mt-2">
            <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4">
                <div class="content-container flex flex-row w-full items-center justify-between h-full">
                    <input type="checkbox" id="list3" class="cbx" style="display: none;">
                    <label for="list3" class="check m-0 cb">
                        <svg width="18px" height="18px" viewBox="0 0 18 18" class="cb">
                            <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <p class="title ml-4 cursor-pointer">Task 3</p>
                    <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto">Today, 15:00</p>
                </div>
                <div class="description-div ml-9 cursor-default">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, inventore?</p>
                    <div class="flex flex-row justify-end edit-container">
                        <button class="w-auto h-auto px-3 py-1 rounded-md edit-box add"><img class="w-5 edit-box" src="./images/edit.svg"></img></button>
                        <button class="w-auto h-auto px-3 py-1 rounded-md delete-box delete"><img class="w-5 delete-box" src="./images/delete.svg"></img></button>
                    </div>
                </div>
            </li>
        </ul>

        
    </div>
    </div>

    <!-- Modal: Add Task -->
    <div class="modal-container-addtask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
        <form action="#" method="POST" class="modal-addtask w-96 px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
            <p class="font-bold place-self-center">Add Task</p>
            <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
                <label>Title</label>
                <input class="h-10 p-3 border rounded-md" name="title" placeholder="Input task title"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Description</label>
                <textarea class="h-20 p-3 border rounded-md" name="description" placeholder="Input task description"></textarea>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Deadline</label>
                <div class="flex flex-row justify-between gap-x-4">
                    <input type="date" class="w-40 h-10 p-3 border rounded-md" name="day" placeholder="Date"/>
                    <input type="time" class="w-40 h-10 p-3 border rounded-md" name="month" placeholder="Time" value="00:00"/>
                </div>
            </div>

            <div class="flex flex-row mt-4  justify-between">
                <button class="cancelform-addtask w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
                <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
            </div>
        </form>
    </div>

    <!-- Modal: Edit Task -->
    <div class="modal-container-edittask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
        <form action="#" method="POST" class="modal-edittask w-96 px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
            <p class="font-bold place-self-center">Edit Task</p>
            <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
                <label>Title</label>
                <input class="h-10 p-3 border rounded-md" name="title" placeholder="Input task title"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Description</label>
                <textarea class="h-20 p-3 border rounded-md" name="description" placeholder="Input task description"></textarea>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Deadline</label>
                <div class="flex flex-row justify-between gap-x-4">
                    <input type="date" class="w-40 h-10 p-3 border rounded-md" name="day" placeholder="Date"/>
                    <input type="time" class="w-40 h-10 p-3 border rounded-md" name="month" placeholder="Time" value="00:00"/>
                </div>
            </div>

            <div class="flex flex-row mt-4  justify-between">
                <button type="button" class="cancelform-edittask w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
                <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
            </div>
        </form>
    </div>

    <!-- Modal: Delete Task -->
    <div class="modal-container-deletetask fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
        <form action="#" method="POST" class="modal-deletetask w-96 px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
            <p class="font-bold place-self-center">Delete Task</p>

            <p class="place-self-center pt-5 pb-3">Are you sure want to delete this task?</p>

            <div class="flex flex-row mt-4  justify-between">
                <button type="button" class="cancelform-deletetask w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
                <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
            </div>
        </form>
    </div>
</body>

<script>
$(document).ready(function() {
    // Meng-handle klik pada checkbox di dalam li
    $('input[type="checkbox"]').on('click', function(e) {
        e.stopPropagation();

        var $checkbox = $(this); 
        var $listItem = $checkbox.closest('.list-container');

        $listItem.addClass("remove");
    });

    // Meng-handle klik pada list item (li) atau elemen di dalamnya
    $('li').on('click', function(e) {
        if ($(e.target).hasClass('cb') || $(e.target).hasClass('edit-box') || $(e.target).hasClass('delete-box')) return;
        console.log(e.target);
        var $clickedList = $(this);  
        var $descriptionDiv = $clickedList.find('.description-div'); 

        $('.description-div.expand').not($descriptionDiv).removeClass('expand');
        $descriptionDiv.toggleClass('expand');
    });

    // Meng-handle klik pada add task button
    $('.addtask').on('click', function(e) {
        console.log(e.target);
        var $clicked = $(document);
        var $descriptionDiv = $clicked.find('.modal-container-addtask'); 
        var $blurContainer = $clicked.find('.bgblur');
        
        $descriptionDiv.removeClass('hidden');
        $blurContainer.addClass('blur');
    });

    // Meng-handle klik pada edit task button
    $('.edit-box').on('click', function(e) {
        console.log(e.target);
        var $clicked = $(document);
        var $descriptionDiv = $clicked.find('.modal-container-edittask'); 
        var $blurContainer = $clicked.find('.bgblur');
        
        $descriptionDiv.removeClass('hidden');
        $blurContainer.addClass('blur');
    });

    // Meng-handle klik pada delete task button
    $('.delete-box').on('click', function(e) {
        console.log(e.target);
        var $clicked = $(document);
        var $descriptionDiv = $clicked.find('.modal-container-deletetask'); 
        var $blurContainer = $clicked.find('.bgblur');
        
        $descriptionDiv.removeClass('hidden');
        $blurContainer.addClass('blur');
    });

    // Meng-handle klik pada cancel form Add Task
    $('.cancelform-addtask').on('click', function(e) {
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
    $('.cancelform-edittask').on('click', function(e) {
        console.log(e.target);
        e.preventDefault();
        var $clicked = $(document);  
        var $descriptionDiv = $clicked.find('.modal-container-edittask'); 
        var $blurContainer = $clicked.find('.bgblur');

        console.log($clicked.find('form')[1]);

        $clicked.find('form')[1].reset();

        $descriptionDiv.addClass('hidden');
        $blurContainer.removeClass('blur');
    });

    // Meng-handle klik pada cancel form Delete Task
    $('.cancelform-deletetask').on('click', function(e) {
        console.log(e.target);
        e.preventDefault();
        var $clicked = $(document);  
        var $descriptionDiv = $clicked.find('.modal-container-deletetask'); 
        var $blurContainer = $clicked.find('.bgblur');

        console.log($clicked.find('form')[2]);

        $clicked.find('form')[2].reset();

        $descriptionDiv.addClass('hidden');
        $blurContainer.removeClass('blur');
    });
    
});
</script>


</html>