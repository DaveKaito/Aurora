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
            <h1 class="text-white text-center my-4 font-weight-bold">New Uploads</h1>

            <div class="grid">
                <div class="grid-sizer">
                    <?php
foreach (glob("../pictures/" . "*.{jpg,webp,png,jpeg}", GLOB_BRACE) as $image) {echo '<div class="grid-item content"><div class="content-overlay"></div><img src="' . $image . '" /><div class="content-details fadeIn-bottom">
    <a href="../pictures/' . $image . '"class=" btn-lg p-5" download ><i class="fas fa-arrow-down fa-3x tect-orange"></i></a>
      </div></div>';}
?>
                </div>
            </div>
        </div>
    </main>
</div>
<!--Main layout-->
<script>
//add 2 css classes for the special searchbar on the main page
$(".main_search").addClass("finesse searchbar");
//function for the special searchbar
function customSearch(x) {
    if (x.matches) {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 350) {
                $(".searchbar").addClass("visible");
            } else {
                $(".searchbar").removeClass("visible");
            }
        });
    }
}
//i wanted to make sure that the searchbar is always visible on mobile
// and does not appear after scrolling like on the desktop
var x = window.matchMedia("(min-width: 992px)");
customSearch(x);
x.addListener(customSearch);
</script>
<?php include SHARED_ROOT . '/pub_footer.php';?>