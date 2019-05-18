<?php require_once '../../private/initialize.php';?>

<?php include PUBLIC_PATH . '/shared/pub_header_landing.php';?>
<style>
@media all and (max-width: 992px) {
    .finesse {
        display: block;
    }
}
</style>

<!-- Full Page Intro -->
<div class="view"
    style="background-image: url('../../assets/img/background_plants.png'); background-repeat: no-repeat; background-size: cover;">
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

            <a href="login.php" class="btn btn-outline-white btn-lg mt-5">Join us as a contributor <i
                    class="fas fa-users ml-2"></i>
            </a>
        </div>
        <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
</div>
<!-- Full Page Intro -->

<!--Main layout-->
<main>
    <div class="container-fluid mt-5">
        <h1 class="text-white my-4 font-weight-bold">Popular images</h1>

        <div class="grid">
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/food3.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image02.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image002.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image06.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image008.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image005.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image010.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image18.jpg" />
            </div>
            <div class="grid-item">
                <img src="https://mdbootstrap.com/img/Photos/Others/image17.jpg" />
            </div>
        </div>
    </div>
</main>
<!--Main layout-->
<?php include PUBLIC_PATH . '/shared/pub_footer.php';?>