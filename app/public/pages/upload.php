<?php
session_start();
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';

?>
<div class="up d-flex flex-column align-items-center justify-content-center"
    style="background-image: url('../../../assets/img/upload.jpg'); background-repeat: no-repeat; background-size: cover;">
    <?php 
    if (empty($_SESSION)) {
header('location:'. PAGES_ROOT . '/pages/start.php');
    exit();
} 
if (!empty($_FILES)){
$target_dir = "../pictures/";
$target_file = $target_dir . basename($_FILES["file-upload"]["name"]);$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
    $check = getimagesize($target_file);
    if ($check !== false) {

        $uploadOk = 1;
    } else {

        $uploadOk = 0;
    }}
// Check if file already exists
    if (file_exists($target_file)) {
        echo "<span id='alert' class='alert alert-warning mb-5'>This file has already been uploaded!</span>";
        $uploadOk = 0;
    } elseif ($_FILES["file-upload"]["size"] > 1000000) {
        echo "<span id='alert' class='alert alert-warning mb-5'>File is too large.(>5MB)</span>";
        $uploadOk = 0;
    } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
        echo "<span id='alert' class='alert alert-warning mb-5'>Sorry, only JPG, JPEG, PNG files are allowed.</span>";
        $uploadOk = 0;
    } else {
        move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file);
        echo "<span id='alert' class='alert alert-success mb-5'>File has been uploaded! :D</span>";
    }
}
?>
    <form autocomplete="off" method="post" enctype="multipart/form-data">

        <div class="file-upload mt-5">
            <input type="file" name="file-upload" onchange="form.submit()" id="file-upload" />
            <i class="fa upic fa-arrow-up fa-xs"></i>
        </div>

    </form>
</div>


<?php include SHARED_ROOT . '/pub_footer.php';?>