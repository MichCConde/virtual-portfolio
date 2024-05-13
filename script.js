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


window.addEventListener('scroll', reveal);

function reveal() {
  var reveals = document.querySelectorAll('.reveal');

  for (var i = 0; i < reveals.length; i++) {
    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 10;

    if (revealtop < windowheight - revealpoint && !reveals[i].classList.contains('rActive')) {
      reveals[i].classList.add('rActive');
    }
  }
}