<?php session_start();?>
<nav class="w-full h-auto py-5 flex items-center px-[20px] md:px-[55px] max-lg:justify-between">
    <div class="brand w-auto font-[Pacifico] text-3xl md:text-4xl basis-1/4">
        <p class="cursor-default">ZenTask</p>
    </div>
    <div class="nav-link basis-1/2 font-[Poppins] font-medium text-lg flex items-center gap-x-[41px] justify-center max-lg:hidden">
        <a href="dashboard.php" class="<?= $_SESSION['Anchor_Page'] == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a>
        <a href="taskList.php" class="<?= $_SESSION['Anchor_Page'] == 'taskList.php' ? 'active' : '' ?>">Tasks</a>
        <a href="ongoingTask.php" class="<?= $_SESSION['Anchor_Page'] == 'ongoingTask.php' ? 'active' : '' ?>">Ongoing</a>
        <a href="completedTask.php" class="<?= $_SESSION['Anchor_Page'] == 'completedTask.php' ? 'active' : '' ?>">Completed</a>
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
            <p class="cursor-pointer font-[Montserrat] text-md text-right max-[1200px]:hidden" <?= $_SESSION['Anchor_Page'] == 'profile.php' ? 'font-bold' : 'font-light' ?>>
                <?= $_SESSION['user']['Username'] ?>
            </p>
        </a>
    </div>
</nav>