// replace sring with user input

var button = document.getElementById('button1');

button.addEventListener('click', ajax_post);

function ajax_post(){
  //
  // var str = document.getElementById('change_text');
  // var str1 = document.getElementById('player1nick');
  // var name = document.getElementById('name');
  //
  // str.innerHTML = name.value;
  // str1.innerHTML = name.value;
  // overlayNick.style.display = 'none';
  var xhr = new XMLHttpRequest();
  var url = "../common/ajax.php";

  var out = document.getElementById('name').value;

  var dis = "name="+out;
  xhr.open("POST",url,true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.onreadystatechange = function() {
        	    if(xhr.readyState == 4 && xhr.status == 200) {

                var return_data = xhr.responseText;
        			  document.getElementById("change_text").innerHTML = return_data;
                overlayNick.style.display = 'none';
        	    }
            }
   xhr.send(dis);
   document.getElementById("change_text").innerHTML = "loading...";
   overlayNick.style.display = 'none';

}


// replace main image with selected image
var i;

for (i = 0; i < document.getElementsByClassName('box').length; i++) {
  var onClickImage = document.getElementsByClassName('box')[i];
  // console.log(onClickImage);

  if (i == 0) {
    onClickImage.addEventListener('click', replaceWithImage);
    onClickImage.addEventListener('click', openNick);
    function replaceWithImage(){
      var img = document.getElementById('logo');
      var img1 =  document.getElementById('player1pick');
      img.src = "../assets/vitalimages/male_1.png";
      img1.src = "../assets/vitalimages/male_1.png";

    }

  }else if (i == 1) {
      onClickImage.addEventListener('click', replaceWithImage);
      onClickImage.addEventListener('click', openNick);
      function replaceWithImage(){
        var img = document.getElementById('logo');
        var img1 =  document.getElementById('player1pick');
        img.src = "../assets/vitalimages/female_1.png";
        img1.src = "../assets/vitalimages/female_1.png";
      }
  }else if (i == 2) {
      onClickImage.addEventListener('click', replaceWithImage);
      onClickImage.addEventListener('click', openNick);
      function replaceWithImage(){
        var img = document.getElementById('logo');
        var img1 =  document.getElementById('player1pick');
        img.src = "../assets/vitalimages/male_2.png";
        img1.src = "../assets/vitalimages/male_2.png";
      }
  }else if (i == 3) {
      onClickImage.addEventListener('click', replaceWithImage);
      onClickImage.addEventListener('click', openNick);
      function replaceWithImage(){
        var img = document.getElementById('logo');
        var img1 =  document.getElementById('player1pick');
        img.src = "../assets/vitalimages/male_2.png";
        img1.src = "../assets/vitalimages/male_2.png";
      }
  }else {
    onClickImage.addEventListener('click', replaceWithImage);
    onClickImage.addEventListener('click', openNick);
    function replaceWithImage(){
      var img = document.getElementById('logo');
      var img1 =  document.getElementById('player1pick');
      img.src = "../assets/vitalimages/logo.png";
      img1.src = "../assets/vitalimages/logo.png";
    }
  }
}


// image overlay
// for (var i = 0; i < document.getElementsByClassName('box').length; i++) {

var onloadClass = document.getElementById('overlay_face');

var onload_close = document.getElementsByClassName('onload_close')[0];

onload_close.addEventListener('click', closeLoad);

window.addEventListener('click', closeOutside);


function closeLoad(){
  onloadClass.style.display = 'none';
}

function closeOutside(e){
  if(e.target == onloadClass){
    onloadClass.style.display = 'none';
  }
}



// Slide javascript

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i, j;
  var slides = document.getElementsByClassName("box");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0 ; i < slides.length; i++) {
    for (var i = 0; i < document.getElementsByClassName("box").length; i++) {
      // for (var y = i%5; y < document.getElementsByClassName("box").length; y++) {

      if (i<4) {
        slides[i].style.display = "block";
        slides[4].style.display = "none";
      }else if (i>=4) {
        slides[i%4].style.display = "none";
        slides[i].style.display = "block";
      }
      else{
        slides[i].style.display = "none";
      }
    // }
    }

      // slides[i].style.display = "none";
      // document.getElementById("box").style.background("Yellow");


  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className  = dots[i].className.replace(" active", "");
      slides[i].className = slides[i].className.replace(" active", "");
       // document.getElementById("box").style.background(" active", "Yellow");

  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  slides[slideIndex-1].className += " active";

}

// Overlay Form

  var overlayNick = document.getElementById('overlay_nick');
  // var myFace = document.getElementById('face');
  // myFace.addEventListener('click', openNick, false);

  var nick_close = document.getElementsByClassName('nick_close')[0];

  nick_close.addEventListener('click', closeNick);

  window.addEventListener('click', closeOutsideForm);

  function openNick(){
    onloadClass.style.display = 'none';
    overlayNick.style.display = 'block';
  }

  function closeNick(){
    overlayNick.style.display = 'none';
  }

  function closeOutsideForm(e){
    if(e.target == overlayNick){
      overlayNick.style.display = 'none';
    }
  }

// var nick_close = document.getElementsByClassName('nick_close')[0];
