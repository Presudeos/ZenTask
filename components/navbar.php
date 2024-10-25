<?php //session_start();?>
<nav class="w-full h-auto py-5 flex items-center px-[20px] md:px-[55px] max-lg:justify-between relative">
    <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
        <p class="cursor-default">ZenTask</p>
    </div>
    <div class="nav-link basis-1/2 font-[Poppins] font-medium text-lg flex items-center gap-x-[41px] justify-center max-lg:hidden">
        <a href="dashboard.php" class="<?= $_SESSION['Anchor_Page'] == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a>
        <a href="taskList.php" class="<?= $_SESSION['Anchor_Page'] == 'taskList.php' ? 'active' : '' ?>">Tasks</a>
        <a href="ongoingTask.php" class="<?= $_SESSION['Anchor_Page'] == 'ongoingTask.php' ? 'active' : '' ?>">Ongoing</a>
        <a href="completedTask.php" class="<?= $_SESSION['Anchor_Page'] == 'completedTask.php' ? 'active' : '' ?>">Completed</a>
    </div>

    <!-- Burger Button -->
    <label class="burger lg:hidden relative z-10" for="burger">
        <input type="checkbox" id="burger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <!-- Mobile Navigation Menu -->
    <div id="mobileMenu" class="fixed top-0 right-[-300px] h-full w-[250px] bg-gray-100 transition-transform transform duration-300 z-9">
        <ul class="flex flex-col py-16 px-5">
            <li><a href="dashboard.php" class="block py-2">Dashboard</a></li>
            <li><a href="taskList.php" class="block py-2">Tasks</a></li>
            <li><a href="ongoingTask.php" class="block py-2">Ongoing</a></li>
            <li><a href="completedTask.php" class="block py-2">Completed</a></li>
            <li><a href="profile.php" class="block py-2">Profile</a></li>
        </ul>
    </div>

    <!-- Profile -->
    <div class="profilenav flex flex-row-reverse h-20 items-center basis-1/4 max-lg:hidden max-lg:place-self-end">
        <a href="profile.php">
            <img src="<?php if(isset($_SESSION['user']['Picture'])) echo("./images/profile/{$_SESSION['user']['Picture']}"); else echo('./images/user_profile.jpg'); ?>" class="cursor-pointer rounded-full object-cover h-12 ml-4" alt="Profile Picture"/>
        </a>
        <a href="profile.php">
            <p class="cursor-pointer font-[Montserrat] text-md text-right max-[1200px]:hidden" <?= $_SESSION['Anchor_Page'] == 'profile.php' ? 'font-bold' : 'font-light' ?>>
                <?= $_SESSION['user']['Username'] ?>
            </p>
        </a>
    </div>
</nav>


<script>
    document.getElementById('burger').addEventListener('change', function() {
    const mobileMenu = document.getElementById('mobileMenu');
    const blur = document.getElementsByClassName('bgblur')[0];
    if (this.checked) {
        mobileMenu.classList.add('open'); // Menu muncul dari kanan
        blur.classList.add('blur');
    } else {
        mobileMenu.classList.remove('open'); // Menu menghilang ke kanan
        blur.classList.remove('blur');
    }
});

</script>