<?php
include '../shared/pub_header.php';
require_once '../../private/functions/db.php';
if(!isset($_SESSION['user_id'])){
header("location: login.php");
} ?>
<style>
.spacer {

    height: 20%;
}

.profile {}

.profile_card {

    border-radius: 10px;
}

.info {
    border-radius: 10px;
}
</style>
<div class="spacer"></div>
<div class="container profile">
    <div class="profile_card card elegant-color">

        <!-- Card content -->
        <div class="card-body ">

            <!-- Title -->
            <h4 class="card-title orange-text pt-5 text-center"><strong><?php echo $_SESSION['user_name'] ?></strong>
            </h4>
            <!-- Subtitle -->
            <div class="card-body info white mt-4">
                <h6 class="font-weight-bold  py-2">User Information</h6>
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

<!-- Card -->
<!-- Card -->

<?php 
include '../shared/pub_footer.php';
?>