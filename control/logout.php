<?php

session_start();

session_destroy();

header("location:../page/sign_in.php");
