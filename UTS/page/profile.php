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
    <nav class="w-full h-auto py-5 flex items-center px-[20px] md:px-[55px] max-lg:justify-between">
        <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
            <p class="cursor-default">ZenTask</p>
        </div>
        <div class="nav-link basis-1/2 font-[Poppins] font-medium text-lg flex items-center gap-x-[41px] justify-center max-lg:hidden">
            <a href="dashboard.php">Dashboard</a>
            <a href="taskList.php">Tasks</a>
            <a href="OngoingTask.php">Ongoing</a>
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
                ></img>
            </a>
            <a href="profile.php">
                <p class="cursor-pointer font-[Montserrat] font-light text-md text-right max-[1200px]:hidden">
                    Anggatha Chandra Virya
                </p>
            </a>
        </div>
    </nav>

<!-- Profile -->
<div class="bgblur">
    <div class="w-full max-w-4xl mx-auto mt-12 flex flex-col md:flex-row justify-center items-center gap-8">
        <div class="flex flex-col items-center md:items-start">
            <img src="./images/user_profile.jpg" class="w-40 h-40 md:w-48 md:h-48 object-cover rounded-full aspect-square mb-4"/>
            <button class="w-auto h-auto pr-3 py-1 rounded-md edit-box add flex gap-x-2 mb-2"><img class="w-5 edit-box" src="./images/edit.svg"></img>Edit</button>
            <button class="w-auto text-blue-500 underline edit-boxpassword">Change Password</button>
        </div>
        <div class="text-md flex flex-col justify-start w-full md:w-auto px-8 md:px-0"> <!-- Padding added for small screens -->
            <p class="mb-2 font-semibold text-gray-700">Username</p>
            <p class="mb-4 text-gray-700">Anggatha Chandra Virya</p>
            <p class="mb-2 font-semibold text-gray-700">Email</p>
            <p class="mb-4 text-gray-700">virya281@gmail.com</p>
            <p class="mb-2 font-semibold text-gray-700">Date Joined</p>
            <p class="mb-4 text-gray-700">10 October 2024</p>
            <p class="mb-2 font-semibold text-gray-700">ZenID</p>
            <p class="text-gray-700">10F21</p>
        </div>
    </div>
</div>





    <!-- Modal: Edit Profile -->
    <div class="modal-container-editprofile fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
        <form action="#" method="POST" class="modal-editprofile w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
            <p class="font-bold place-self-center">Edit Profile</p>
            <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
                <label>Username</label>
                <input class="h-10 p-3 border rounded-md w-full" name="username" placeholder="Input username"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Email</label>
                <input class="h-10 p-3 border rounded-md w-full" name="email" placeholder="example@example.com"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Enter your password</label>
                <input type="password" class="h-10 p-3 border rounded-md w-full" name="oldpassword" placeholder="Input password"/>
            </div>

            <div class="flex flex-row mt-4  justify-between">
                <button type="button" class="cancelform-editprofile w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
                <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
            </div>
        </form>
    </div>

    <!-- Modal: Edit Password -->
    <div class="modal-container-editpassword fixed top-0 left-0 h-full w-full flex items-center justify-center hidden">
        <form action="#" method="POST" class="modal-editpassword w-11/12 max-w-md px-8 py-8 flex flex-col justify-center bg-white rounded-md shadow font-[Roboto]">
            <p class="font-bold place-self-center">Edit Password</p>
            <div class="flex flex-col mb-3 mt-4 text-sm gap-y-1">
                <label>Enter your password</label>
                <input type="password" class="h-10 p-3 border rounded-md w-full" name="oldpassword" placeholder="Input password"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Enter new password</label>
                <input type="password" class="h-10 p-3 border rounded-md w-full" name="newpassword" placeholder="Input new password"/>
            </div>
            <div class="flex flex-col mb-3 text-sm gap-y-1">
                <label>Re-enter new password</label>
                <input type="password" class="h-10 p-3 border rounded-md w-full" name="reenter-newpassword" placeholder="Re-enter new password"/>
            </div>

            <div class="flex flex-row mt-4 justify-between">
                <button type="button" class="cancelform-editpassword w-28 h-8 rounded-md bg-gray-400 text-md text-white">Cancel</button>
                <input type="submit" class="w-28 h-8 rounded-md bg-green-500 text-md text-white flex justify-center items-center cursor-pointer">
            </div>
        </form>
    </div>


</body>

<script>
$(document).ready(function() {
    // Meng-handle klik pada edit profile button
    $('.edit-box').on('click', function(e) {
        console.log(e.target);
        var $clicked = $(document);
        var $Div = $clicked.find('.modal-container-editprofile'); 
        var $blurContainer = $clicked.find('.bgblur');
        
        $Div.removeClass('hidden');
        $blurContainer.addClass('blur');
    });

    // Meng-handle klik pada cancel form Edit Profile
    $('.cancelform-editprofile').on('click', function(e) {
        console.log(e.target);
        e.preventDefault();
        var $clicked = $(document);  
        var $Div = $clicked.find('.modal-container-editprofile'); 
        var $blurContainer = $clicked.find('.bgblur');

        $clicked.find('form')[0].reset();

        $Div.addClass('hidden');
        $blurContainer.removeClass('blur');
    });


    // Meng-handle klik pada edit password button
    $('.edit-boxpassword').on('click', function(e) {
        console.log(e.target);
        var $clicked = $(document);
        var $Div = $clicked.find('.modal-container-editpassword'); 
        var $blurContainer = $clicked.find('.bgblur');
        
        $Div.removeClass('hidden');
        $blurContainer.addClass('blur');
    });

    // Meng-handle klik pada cancel form Edit Password
    $('.cancelform-editpassword').on('click', function(e) {
        console.log(e.target);
        e.preventDefault();
        var $clicked = $(document);  
        var $Div = $clicked.find('.modal-container-editpassword'); 
        var $blurContainer = $clicked.find('.bgblur');

        $clicked.find('form')[0].reset();

        $Div.addClass('hidden');
        $blurContainer.removeClass('blur');
    });


});
</script>

</html>
