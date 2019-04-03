var modal = document.getElementById('signinModal');
var btn = document.getElementById("signinModalBtn");

btn.addEventListener('click', function(){modal.style.display = "block";});

// btn.onclick = function () {
//   modal.style.display = "block";
// }

window.onclick = function (event) {
    if(event.target == modal){
      modal.style.display = "none";
    }
}
