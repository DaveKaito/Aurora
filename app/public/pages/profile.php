<?php
session_start();
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';
if (empty($_SESSION['is_user'])) {
   header("location: login.php");
    exit(); 
}?>

<div class="maincontainer">
    <div class="container profile p-5 ">
        <div class="profile_card card elegant-color mt-5">

            <!-- Card content -->
            <div class="card-body ">

                <!-- Title -->
                <h4 class="card-title orange-text pt-3 text-center">
                    <strong>Hi <?php echo $_SESSION['user_name'] ?> !</strong>
                </h4>
                <!-- Subtitle -->
                <div class="card-body elegant-color-dark info white mt-4">
                    <h6 class="font-weight-bold py-2">User Information</h6>
                    <!-- Text -->
                    <p class="card-text">Username: <?php echo $_SESSION['user_name']; ?>
                    </p>
                    <p class="card-text">Email: <?php echo $_SESSION['user_email']; ?>
                    </p>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-orange"><i class="fas fa-magic mr-3"></i> Change Password</button>
                    <button class="btn btn-orange "><i class="fas fa-magic mr-3"></i> Edit Profile Info</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->
<!-- Card -->

<?php
include SHARED_ROOT . '/pub_footer.php';
?>