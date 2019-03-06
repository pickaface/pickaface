(function() {
  var pickAFaceButton = document.querySelector(".top-container .showcase .btn");

  function pafan() {
    var height = window.innerHeight;
    var width = window.innerWidth;
    var overlay = document.getElementById('overlay');
    var dialogbox = document.getElementById('popup-contents');
    overlay.innerHTML =  '<div><div id="dialog_head"></div><div id="dialog_body"> <button type="button" name="button" onclick="ok()">OK</button> </div></div>';
    var dialogboxHead = document.getElementById('dialog_head');
    var scrollPos = window.scrollY;

    overlay.style.height = height + "px";
    overlay.style.display = "block";
    overlay.style.top = scrollPos + "px";

    dialogbox.style.display = "block";

    dialogboxHead.innerHTML = "<p>" + "message" + "</p>";
    dialogbox.style.top = (height - dialogbox.offsetHeight)/2 + scrollPos +"px";
    dialogbox.style.left = width/4 + "px";

    window.addEventListener('scroll', aboutScroll = function () {
      noscroll(scrollPos);
    });

  }


  pickAFaceButton.addEventListener("click", function () {
    pafan();
  });
})();

// function noscroll(y) {
//     window.scrollTo( 0,  y);
// }
//
// function ok() {
//   var overlay = document.getElementById('overlay');
//   var dialogbox = document.getElementById('dialogbox');
//   dialogbox.style.display = "none";
//   overlay.style.display = "none";
//   window.removeEventListener("scroll", aboutScroll);
// }
