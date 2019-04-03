(function () {
  var heading = document.querySelector(".navbar-img-1-div");
  var headerNav = document.querySelector("header nav");
  if(heading != null){
    heading.addEventListener("click", function () {
      headerNav.style.display = "block";
    });
  }
})();
