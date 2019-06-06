<?php
session_start();
// This variable will only display the login button for users that are not logged in according to the session
$non_user = '
<li class="nav-item">
    <a href="login.php" target="_self" class="nav-link border  border-light rounded">
        <i class="fas fa-sign-in-alt mr-2"></i>
        <p class="d-none d-lg-inline">Login </p>
    </a>
</li>';
// This variable will display all buttons for users that are  logged in according to the session
$user = '
<li class="nav-item mr-4">
    <a href="upload.php" class="nav-link border border-light rounded">
        <i class="fas fa-upload"></i>
        <p class="d-none d-lg-inline ">Upload</p>
    </a>
</li>
<li class="nav-item mr-4">
    <a href="../functions/logout.php" target="_self" class="nav-link border border-light rounded">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <p class="d-none d-lg-inline">Logout </p>
    </a>
</li>
<li class="nav-item">
    <a href="profile.php" target="_self" class="nav-link border border-light rounded">
        <i class="fas fa-user-astronaut"></i>
    </a>
</li>';
// This variable will display all buttons for admins that are  logged in according to the session
$admin = '
<li class="nav-item mr-4">
    <a href="dashboard.php" class="nav-link border border-light rounded">
        <i class="fas fa-upload"></i>
        <p class="d-none d-lg-inline ">Dash</p>
    </a>
</li>
<li class="nav-item mr-4">
    <a href="../functions/logout.php" target="_self" class="nav-link border border-light rounded">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <p class="d-none d-lg-inline">Logout </p>
    </a>
</li>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Aurora</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!-- Bootstrap core CSS -->
    <link href="../../assets/mdb/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="../../assets/mdb/css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="../../assets/mdb/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/custom.css" />

    <style>
    @media (max-width: 992px) {
        .form-control {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    }
    </style>
</head>

<body class="elegant-color-dark">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="landing.php" target=""><img src="../../assets/img/aurora_orange.png"
                    height="40" alt="aurora logo" />
            </a>
            <!-- Collapse -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../pages/landing.php">Aurora

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="license.php">License</a>
                    </li>
                </ul>
                <form class="fixed main_search mr-auto w-50 ">
                    <input class="form-control " type="text" placeholder="Search" aria-label="Search" />
                </form>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">


                    <?php if (isset($_SESSION['user_id'])) {
                        echo $user;
                    } else if(isset($_SESSION['admin_id'])){
                        echo $admin;
                    }
                    else {
                        echo $non_user;
                    }?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->