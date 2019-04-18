<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
//dirname(dirname(dirname(__FILE__))) = /media/sf_zebbox/agora which is requied for the
//following line of code
//dirname($_SERVER['PHP_SELF'], 3) = /agora which is needed for URI used in redirection
require_once P_ROOT.DS.'includes'.DS.'init.php';
?>
<?php

if($my_session->is_signed_in()){
  $my_session->signout();
}
//$_SESSION["admin_signin_pin"]; $_SESSION["admin_signin_email"]
///////////////////SIGNIN PROCESS//////////////////
try {
  if(isset($_POST['admin_signin'], $_POST['admin_signin_email'],
  $_POST['admin_signin_pin'], $_POST['password'],
  $_SESSION["admin_signin_pin"], $_SESSION["admin_signin_email"]) &&
  $_SESSION["admin_signin_pin"] == $_POST['admin_signin_pin']
  && $_SESSION["admin_signin_email"] === $_POST['admin_signin_email']){
    $email = filter_var($_POST["admin_signin_email"], FILTER_SANITIZE_EMAIL);
    User::email_used(($email));
    Admin::is_admin($email);
    $current_admin = new Admin(
      array(
        "id" => 0,
        "name_prefix" => "Mr.",
        "first_name" => "NFN",
        "last_name" => "NLN",
        "current_edu_level" => "Below_9",
        "username" => "NUN",
        "password" => "NUN",
        "email" => $email,
        "phone_number" => "10",
        "street_address" => "NSA",
        "address_city" => "NC",
        "address_state" => "YY",
        "address_country" => "CC",
        "address_zip" => "10",
        "latest_edu_institution" => "NEI",
        "type" => "admin",
        "comment" => "NC"
      ));
    $current_admin->verify_email_and_instantiate();
    $current_admin->is_not_blocked();
    if(password_verify(trim($_POST['password']), $current_admin->password)){
      $my_session->signin($current_admin);
      $my_session->save_last_ativity_time();
      header("Location: adminsignout.php");
    }else{
      throw new Exception("Invalid password");
    }
  }

} catch (Exception $e) {
  $alert_message = $e->getMessage();
}


//////////////////////END SIGNIN PROCESS/////////////
?>
<div class="meta-head">
    <?php require_once 'adminhead.php'; ?>
      <h2 id="signinup-h2">PickAFace Admins are Welcome; hackers/Intruders will be prosecuted</h2>
    </header>
</div>
    <div class="formdiv">
      <form method="post">
        <input type="email" name="admin_signin_email" placeholder="Email" required id="admin-signin-email"><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <p>
            <label>Select type</label>
            <select id = "mytype">
              <option value = "1">User</option>
              <option value = "2">Admin</option>
            </select>
         </p>
        <input type="number" name="admin_signin_pin" placeholder="PIN" required><br><br>
        <button type="submit" name="admin_signin" class="signup-button">Admin Signin</button>
      </form>
    </div>
<script type="text/javascript" src=<?php echo "..".DS."javascript".DS."adminsignin.js";?>></script>
<?php require_once 'adminfoot.php'; ?>
<?php unset($_SESSION["message"]) ?>
