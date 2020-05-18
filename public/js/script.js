window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.documentElement.scrollTop > 1) {
    document.getElementById("header").style.background = "rgba(0,0,0,0.75)";
  } else {
    document.getElementById("header").style.background = "rgba(0,0,0,0.55)";
  }
}

function goToCont(){
	var element = document.getElementById("footer");
	element.scrollIntoView({behavior: "smooth"});
}