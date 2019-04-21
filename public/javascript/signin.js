var modal1 = document.getElementById('signinModal');
var btn1 = document.getElementById("signinModalBtn");

btn1.addEventListener('click', function(){modal1.style.display = "block";}, false);

// btn.onclick = function () {
//   modal.style.display = "block";
// }

window.onclick = function (event) {
    if(event.target == modal1){
      modal1.style.display = "none";
    }
}
