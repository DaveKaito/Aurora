<?php
session_start();
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';
?>
<div class="view"
    style="background-image: url('../../../assets/img/background_plants.webp'); background-repeat: no-repeat; background-size: cover;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
            <h1 class="mb-5">
                <strong>Get high quality images for free</strong>
            </h1>

            <div class="active-cyan-4 mx-auto">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" />
            </div>

            <a href="register.php" class="btn btn-outline-white btn-lg mt-5">Join us as a
                contributor <i class="fas fa-users ml-2"></i>
            </a>
        </div>
        <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
</div>
<!-- Full Page Intro -->

<!--Main layout-->
<div class="maincontainer">
    <main>
        <div class="container-fluid mt-5">
            <h1 class="text-white my-4 font-weight-bold">Popular images</h1>

            <div class="grid">
                <div class="grid-sizer">
                    <?php
foreach (glob("../pictures/" . "*.{jpg,webp}", GLOB_BRACE) as $image) {echo '<div class="grid-item content"><div class="content-overlay"></div><img src="' . $image . '" /><div class="content-details fadeIn-bottom">
    <a href="../pictures/' . $image . '"class="btn-lg rounded-circle btn-orange transparent-text" download><i class="fas fa-arrow-down"></i></a>
      </div></div>';}
?>
                </div>
            </div>
        </div>
    </main>
</div>
<!--Main layout-->
<?php include SHARED_ROOT . '/pub_footer.php';?>