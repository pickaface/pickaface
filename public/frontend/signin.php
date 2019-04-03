<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href=../stylesheets/mediaflex.css>
    <link rel="stylesheet" href=../stylesheets/masterstyle.css>
    <link rel="stylesheet" href=../stylesheets/signinup.css>
    <script type="text/javascript" src=../javascript/pickalert.js></script>

  </head>
  <body  >
    <div id="overlay"></div>
    <div id="dialogbox">
      <div>
        <div id="dialog_head"></div>
        <div id="dialog_body"> <button type="button" name="button" onclick="ok()">OK</button> </div>
      </div>
    </div>
    <header>
      <div class="navbar-img-1-div">
        <img id="navbar-img-1" src=../assets/vitalimages/fcon.png  alt="PickAFace"
        ><h2>signin</h2>
      </div>
      <div class="top-grid">
        <nav>
          <img id="navbar-img" src=../assets/vitalimages/logo.png  alt="PickAFace">
          <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body><a class="" href="home.php">PickAFace</a>
<a class="thisPage" href="signin.php" id="signin_for_php">Signin</a></body></html>
        </nav>
    <!-- </header> -->        <div class="">

        </div>
        <h2 id="signinup-h2">Welcome to pickaface.com, Please Signin  <a href="signup.php" style="color: white;">Signup</a></h2>
      </div>
    </header>
    <div class="formdiv">
      <form method="post">
        <input type="email" spellcheck="false" name="email" placeholder="Email" required value=>
        <input type=password name="password" placeholder="Password Forgot your password Enter a new password and press SEND PIN" required>
                <div class="password-div">
          <button type="submit" name="signin" id="signin-button">Signin</button>
          <button type=submit name="get_pin" id="change-button">Send PIN</button>
        </div>
      </form>
    </div>
    <div class="header-like">
      <nav>
        <h2>
          Not a member? Please &rsaquo;<a href="signup.php" style="color: white;">Free Signup</a>
        </h2>
      </nav>
    </div>
    <script type="text/javascript" src=../javascript/navbar.js></script>
  </body>
</html>
