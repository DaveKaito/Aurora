//init masonry plugin
var $grid = $(".grid").masonry({
  itemSelector: ".grid-item",
  percentPosition: true,
  columnWidth: ".grid-sizer"
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function () {
  $grid.masonry();
});

//add 2 css classes for the special searchbar on the main page
$(".main_search").addClass("finesse searchbar");
//function for the special searchbar
function customSearchX(x) {
  if (x.matches) {
    $(window).scroll(function () {
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
