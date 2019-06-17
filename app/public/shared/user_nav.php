<?php session_start(); ?>

<body class="elegant-color-dark">
    <!-- Navbar -->
    <div class="loader">
        <div class="spinner"></div>
    </div>
    <nav class="navbar fixed-top navbar-expand-xl navbar-dark">
        <div class="container col">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo PAGES_ROOT; ?>/start.php"><img
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
                        <a class="nav-link" href="<?php echo PAGES_ROOT?>/start.php">Aurora
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
                    <li class="nav-item mr-4">
                        <a href="<?php echo PAGES_ROOT; ?>/upload.php" class="nav-link border border-light rounded">
                            <i class="fas fa-upload"></i>
                            <p class="d-none d-xl-inline ">Upload</p>
                        </a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="<?php echo FUNC_ROOT; ?> /logout.php" class="nav-link border border-light rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <p class="d-none d-xl-inline">Logout </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo PAGES_ROOT; ?>/profile.php" class="nav-link border border-light rounded">
                            <i class="fas fa-user-astronaut"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar -->