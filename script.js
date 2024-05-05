// Sticky header
window.onscroll = function() {headerAnimation()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function headerAnimation() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    header.classList.add("headerChange");
  } else {
    header.classList.remove("sticky");
    header.classList.remove("headerChange");

  }
}
