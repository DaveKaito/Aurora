<?php
session_start();
// checks user activity if last request was more than 20 minutes ago session gets destroyed
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1200)) {
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header('location:' . PAGES_ROOT . '/index.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

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
    <link href="<?php echo MDB_ROOT; ?>/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="<?php echo MDB_ROOT; ?>/css/mdb.min.css" rel=" stylesheet" />
    <link href="<?php echo MDB_ROOT; ?>/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo ASSETS_ROOT; ?>/css/custom.css" rel="stylesheet" />
    <link rel="icon" href="<?php echo ASSETS_ROOT; ?>/img/favi.ico" type="image/x-icon" />

    <style>
    @media (max-width: 1200px) {
        .form-control {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    }

    .maincontainer {
        min-height: calc(100vh - 179px) !important;
    }
    </style>
</head>

<body class="elegant-color-dark">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-xl navbar-dark">
        <div class="container col">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo PAGES_ROOT; ?>/index.php"><img
                    src="<?php echo ASSETS_ROOT; ?>/img/aurora_orange.png" height="40" alt="aurora logo" />
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
                        <a class="nav-link" href="<?php echo PAGES_ROOT; ?>/index.php">Aurora
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo PAGES_ROOT; ?>/blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo PAGES_ROOT; ?>/license.php">License</a>
                    </li>
                </ul>
                <form class="fixed main_search mr-auto w-50 ">
                    <input class="form-control " type="text" placeholder="Search" aria-label="Search" />
                </form>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <!-- echoing the different navigations depending on session -->

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item mr-4">
                        <a href="<?php echo PAGES_ROOT; ?>/upload.php" class="nav-link border border-light rounded">
                            <i class="fas fa-upload"></i>
                            <p class="d-none d-xl-inline ">Upload</p>
                        </a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="<?php echo FUNC_ROOT; ?> /logout.php" target="_self"
                            class="nav-link border border-light rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <p class="d-none d-xl-inline">Logout </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo PAGES_ROOT; ?>/profile.php" target="_self"
                            class="nav-link border border-light rounded">
                            <i class="fas fa-user-astronaut"></i>
                        </a>
                    </li>
                    <?php ?>
                    <?php elseif (isset($_SESSION['admin_id'])): ?>
                    <li class="nav-item mr-4">
                        <a href="<?php echo PAGES_ROOT; ?>/upload.php" class="nav-link border border-light rounded">
                            <i class="fas fa-upload"></i>
                            <p class="d-none d-xl-inline ">Upload</p>
                        </a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="<?php echo PRIV_ROOT; ?>/dashboard.php" class="nav-link border border-light rounded">
                            <i class="fas fa-tachometer-alt"></i>
                            <p class="d-none d-xl-inline ">Dash</p>
                        </a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="<?php echo FUNC_ROOT; ?>/logout.php" target="_self"
                            class="nav-link border border-light rounded">
                            <i class="fas fa-sign-out-alt"></i>
                            <p class="d-none d-xl-inline">Logout </p>
                        </a>
                    </li>
                    <?php ?>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo PAGES_ROOT; ?>/register.php" target="_self"
                            class="nav-link border  border-light rounded">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <p class="d-none d-xl-inline">Register </p>
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->