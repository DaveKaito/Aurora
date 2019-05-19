//function for the appearing searchbar after scrolling
function customSearch(x) {
  if (x.matches) {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      if (scroll >= 350) {
        $(".searchbar").addClass("visible");
      } else {
        $(".searchbar").removeClass("visible");
      }
      console.log("hi dipshit");
    });
  }
}
var x = window.matchMedia("(min-width: 992px)");
customSearch(x);
x.addListener(customSearch);
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
