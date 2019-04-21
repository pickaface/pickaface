// alert("test");
var character = "O";

var gameModal = document.getElementById('TickTacToe');
var gameModal2 = document.getElementsByClassName('slide1');

var gameBtn = document.getElementById('gameMini');
var gameBtn2 = document.getElementById('desert');

gameBtn.addEventListener('click', openGameOverlay);
gameBtn2.addEventListener('click', openGameOverlay);

window.addEventListener('click', closeOutside);

function openGameOverlay(){
  gameModal.style.display = 'block';
  gameModal2.style.display = 'block';
}

function closeOutside(e){
    if((e.target == gameModal) || (e.target == gameModal2)){
        gameModal.style.display = 'none';
        gameModal2.style.display = 'none';
    }
}
//setzt Buttons zurück
function resetToDefault() {
    var b1 = document.getElementById("1");
    var b2 = document.getElementById("2");
    var b3 = document.getElementById("3");
    var b4 = document.getElementById("4");
    var b5 = document.getElementById("5");
    var b6 = document.getElementById("6");
    var b7 = document.getElementById("7");
    var b8 = document.getElementById("8");
    var b9 = document.getElementById("9");

    b1.value="";
    b2.value="";
    b3.value="";
    b4.value="";
    b5.value="";
    b6.value="";
    b7.value="";
    b8.value="";
    b9.value="";
    b1.disabled=false;
    b2.disabled=false;
    b3.disabled=false;
    b4.disabled=false;
    b5.disabled=false;
    b6.disabled=false;
    b7.disabled=false;
    b8.disabled=false;
    b9.disabled=false;

    document.getElementById("gamepopup").style.visibility = "hidden";
    document.getElementById("overlay_game").style.visibility = "hidden";
}

function buttonsdeactivate() {
    var b1 = document.getElementById("1");
    var b2 = document.getElementById("2");
    var b3 = document.getElementById("3");
    var b4 = document.getElementById("4");
    var b5 = document.getElementById("5");
    var b6 = document.getElementById("6");
    var b7 = document.getElementById("7");
    var b8 = document.getElementById("8");
    var b9 = document.getElementById("9");

    b1.disabled = true;
    b2.disabled = true;
    b3.disabled = true;
    b4.disabled = true;
    b5.disabled = true;
    b6.disabled = true;
    b7.disabled = true;
    b8.disabled = true;
    b9.disabled = true;
}

function popupdemonstrate(winner) {
      //deaktiviert alle Buttons
      buttonsdeactivate();

      var win = winner;
      //ersetzt Text
      var popuptext = document.getElementById("text");
      popuptext.innerHTML = winner + " wins.";
      console.log(win);
      //window.location.href="result.php?name="+popuptext;

      popuptext = document.getElementById("text");
      popuptext.innerHTML = winner + " wins.";


      //macht Popup sichtbar
      var pop = document.getElementById("gamepopup");
      var overlay = document.getElementById("overlay_game");
      pop.style.visibility = "visible";
      overlay.style.visibility ="visible"
}

function draw(){
  // buttonsdeactivate();

  //ersetzt Text
  popuptext = document.getElementById("text");
  popuptext.innerHTML = " Draw.";

  //macht Popup sichtbar
  var pop = document.getElementById("gamepopup");
  var overlay = document.getElementById("overlay_game");
  pop.style.visibility = "visible";
  overlay.style.visibility ="visible"
}

//prüft, ob Spiel zu Ende ist
function endTryItOut() {
    //Zustand der Buttons wird ausgelesen
    var b1 = document.getElementById("1").value;
    var b2 = document.getElementById("2").value;
    var b3 = document.getElementById("3").value;
    var b4 = document.getElementById("4").value;
    var b5 = document.getElementById("5").value;
    var b6 = document.getElementById("6").value;
    var b7 = document.getElementById("7").value;
    var b8 = document.getElementById("8").value;
    var b9 = document.getElementById("9").value;

    //obere Reihe
    if (((b1=="X") || (b1=="O")) && ((b1 == b2) && (b2 == b3))) {
        popupdemonstrate(b1);
    }
    //linke Spalte
    else if (((b1=="X") || (b1=="O")) && ((b1 == b4) && (b4 == b7))){
        popupdemonstrate(b1);
    }
    //untere Reihe
    else if (((b9=="X") || (b9=="O")) && ((b9 == b8) && (b8 == b7))){
        popupdemonstrate(b9);
    }
    //rechte Spalte
    else if (((b9=="X") || (b9=="O")) && ((b9 == b6) && (b6 == b3))){
      popupdemonstrate(b9);
    }
    //mittlere Reihe
    else if (((b4=="X") || (b4=="O")) && ((b4 == b5) && (b5 == b6))){
      popupdemonstrate(b4);
    }
    //mittlere Spalte
    else if (((b2=="X") || (b2=="O")) && ((b2 == b5) && (b5 == b8))){
      popupdemonstrate(b2);
    }
    //1-9 Diagonale
    else if (((b1=="X") || (b1=="O")) && ((b1 == b5) && (b5== b9))){
      popupdemonstrate(b1);
    }
    //7-3 Diagonale
    else if (((b7=="X") || (b7=="O")) && ((b7 == b5) && (b5 == b3))){
      popupdemonstrate(b7);
    }
    // else if((b1!=b2!=b3) || (b4!=b5!=b6) || (b7!=b8!=b9) && (b1!=b4!=b7) && (b2!=b5!=b8) && (b3!=b6!=b9) && (b1!=b5!=b9) && (b3!=b5!=b7)) {
    //   draw();
    // }
    //unentschieden
//     else {
//     alert("Unetschieden");
//     }
    }




//X oder Y einput
function put(x, character) {
     if (x==1) {
     var button = document.getElementById("1");
     button.value = character;
     button.disabled=true;
     }
     else if (x==2) {
     var button = document.getElementById("2");
     button.value = character;
     button.disabled=true;
     }
     else if (x==3) {
     var button = document.getElementById("3");
     button.value = character;
     button.disabled=true;
     }
     else if (x==4) {
     var button = document.getElementById("4");
     button.value = character;
     button.disabled=true;
     }
     else if (x==5) {
     var button = document.getElementById("5");
     button.value = character;
     button.disabled=true;
     }
     else if (x==6) {
     var button = document.getElementById("6");
     button.value = character;
     button.disabled=true;
     }
     else if (x==7) {
     var button = document.getElementById("7");
     button.value = character;
     button.disabled=true;
     }
     else if (x==8) {
     var button = document.getElementById("8");
     button.value = character;
     button.disabled=true;
     }
     else if (x==9) {
     var button = document.getElementById("9");
     button.value = character;
     button.disabled=true;
     }
     endTryItOut();
     }

//welches character?
function xoo(button) {
    if (character=="X") {
    character="O";
    put(button, character);
    }
    else if (character=="O") {
    character="X";
    put(button, character);
    }
  }
