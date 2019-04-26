var modal10 = document.getElementById('Modal10');
var btn10 = document.getElementById("gamebtn10");

btn10.addEventListener('click', function(){
  modal10.style.display = "block";
}
);

// btn.onclick = function () {
//   modal.style.display = "block";
// }

window.onclick = function (event) {
    if(event.target == modal10){
      modal10.style.display = "none";
    }
}
