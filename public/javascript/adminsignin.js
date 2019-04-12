(function () { //wrapping closure
  var email = document.getElementById("admin-signin-email");
  function validateEmail(email){
    //this regex was not written by Dr. Zeb
    var emailRegex = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    return emailRegex.test(email);
  }

  function sendEmail(emailType, email_value) {
    if(validateEmail(email_value)){
      var xhr = new XMLHttpRequest();
      var url = "../common/adminsigninpin.php?" + emailType + "=" + email_value;
      xhr.open("GET", url, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
          if(xhr.responseText != "Do nothing."){
            alert(xhr.responseText);
          }
        }
      };
      xhr.send();
    }else{
      alert("Invalid Email Address...");
    }
  }

  email.addEventListener("focusout", function () {
    sendEmail("admin_signin_email", email.value);
  });

})();//wrapping closure ends

//////////////////////adminpopup///////////////////

function signin(){
      btnsignin.style.display = 'block';
}
