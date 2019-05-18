//function for the appearing searchbar after scrolling
$(window).scroll(function() {
  if (document.documentElement.clientWidth >= 992) {
    var scroll = $(window).scrollTop();

    if (scroll >= 350) {
      $(".searchbar").addClass("visible");
    } else {
      $(".searchbar").removeClass("visible");
    }
  }
});

// init Masonry
var $grid = $(".grid").masonry({
  itemSelector: ".grid-item",
  percentPosition: true,
  columnWidth: ".grid-sizer"
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function() {
  $grid.masonry();
});
