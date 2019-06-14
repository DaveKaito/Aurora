<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';

?>

<!-- Full Page Intro -->
<div class="view"
    style="background-image: url('../../../assets/img/background_plants.png'); background-repeat: no-repeat; background-size: cover;">
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
</div>
<!--Main layout-->
<?php include SHARED_ROOT . '/pub_footer.php';?>
<script>
//init masonry plugin
var $grid = $(".grid").masonry({
    itemSelector: ".grid-item",
    percentPosition: true,
    columnWidth: ".grid-sizer"
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function() {
    $grid.masonry();
});


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