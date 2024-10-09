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
<body>
    <!-- Navigation -->
    <nav class="w-full h-auto py-5 flex items-center px-[20px] md:px-[55px] max-lg:justify-between">
        <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
            <p>ZenTask</p>
        </div>
        <div class="nav-link basis-1/2 font-[Poppins] font-medium text-lg flex items-center gap-x-[41px] justify-center max-lg:hidden">
            <a href="dashboard.php">Dashboard</a>
            <a href="taskList.php" class="active">Task List</a>
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
            <img
                src="./images/user_profile.jpg"
                class="cursor-pointer rounded-full object-cover h-12 ml-4"
                alt=""
            ></img>
            <p class="cursor-pointer font-[Montserrat] font-light text-md text-right max-[1100px]:hidden">
                Anggatha Chandra Virya
            </p>
        </div>
    </nav>


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

        <!-- Add task -->
         <div class="flex w-full h-auto justify-center items-center md:justify-between flex-col md:flex-row gap-y-3">
            <p class="font-[Poppins] font-bold text-xl">All your tasks:</p>
            <button class="button1" type="button">
                <span class="button1__text font-[Roboto] font-bold text-base">Add Task</span>
                <span class="button1__icon"><svg class="svg" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg></span>
            </button>
         </div>
        <!-- Task List -->
        <ul class="text-base mt-3 md:mt-2">
            <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4 cursor-pointer">
                <div class="content-container flex flex-row w-full items-center justify-between">
                    <input type="checkbox" id="list1" class="cbx" style="display: none;">
                    <label for="list1" class="check m-0">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <p class="title ml-4 cursor-pointer">Task 1</p>
                    <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto">Yesterday, 15:00</p>
                </div>
                <div class="description-div ml-9 cursor-default">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, inventore?</p>
                </div>
            </li>
            <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4">
                <div class="content-container flex flex-row w-full items-center justify-between">
                    <input type="checkbox" id="list2" class="cbx" style="display: none;">
                    <label for="list2" class="check m-0">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <p class="title ml-4 cursor-pointer">Task 2</p>
                    <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto">Today, 09:00</p>
                </div>
                <div class="description-div ml-9 cursor-default">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, inventore?</p>
                </div>
            </li>
            <li class="list-container flex items-center py-3 font-[Montserrat] flex-wrap hover:bg-blue-100 rounded-md px-4">
                <div class="content-container flex flex-row w-full items-center justify-between h-full">
                    <input type="checkbox" id="list3" class="cbx" style="display: none;">
                    <label for="list3" class="check m-0">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <p class="title ml-4 cursor-pointer">Task 3</p>
                    <p class="deadline mr-4 cursor-pointer max-sm:place-self-end ml-auto">Today, 15:00</p>
                </div>
                <div class="description-div ml-9 cursor-default">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, inventore?</p>
                </div>
            </li>
        </ul>
        
    </div>
</body>

<script>

$(document).ready(function() {
    // Meng-handle klik pada list item (li) atau elemen di dalamnya
    $('.list-container').on('click', function(e) {
        // Cegah event dari checkbox agar tidak ikut ter-trigger
        if ($(e.target).is('input[type="checkbox"]') || $(e.target).is('label')) {
            return;
        }

        var $clickedList = $(this);  // elemen li yang diklik
        var $descriptionDiv = $clickedList.find('.description-div'); // div deskripsi dalam li

        // Jika ada elemen yang sudah di-expand, hilangkan class .expand terlebih dahulu
        $('.description-div.expand').not($descriptionDiv).removeClass('expand');

        // Toggle class .expand untuk description di dalam list yang diklik
        $descriptionDiv.toggleClass('expand');
    });

    // Meng-handle klik pada checkbox di dalam li
    $('input[type="checkbox"]').on('click', function() {
        var $checkbox = $(this);  // checkbox yang diklik
        var $listItem = $checkbox.closest('.list-container'); // list item (li) dari checkbox

        // Tambahkan attribute disabled ke checkbox yang diklik
        $checkbox.prop('disabled', true);
        $checkbox.parent().parent().addClass("remove");


        // Hapus list item setelah 1 detik
        setTimeout(function() {
            $listItem.fadeOut(400, function() {
                $(this).remove();
            });
        }, 1000);
    });
});

</script>

</html>