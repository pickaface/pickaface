<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
//dirname(dirname(dirname(__FILE__))) = /media/sf_zebbox/agora which is requied for the
//following line of code
//dirname($_SERVER['PHP_SELF'], 3) = /agora which is needed for URI used in redirection
require_once P_ROOT.DS.'includes'.DS.'init.php';
?>
<?php
if(!isset($_SESSION["pin"])){
    header("Location: "."..".DS."frontend".DS."signup.php");
}
if(isset($_POST['signin'])){
  unset($_SESSION['pin']);
  header("Location: ..".DS."frontend".DS."signin.php");
}

if(isset($_POST['pin_send'])){
  if($_POST['pin'] == $_SESSION['pin']){
    try {
      $temp_user = unserialize($_SESSION["current_user"]);
      $current_user = new User(
        $temp_user->id,
        $temp_user->first_name,
        $temp_user->last_name,
        $temp_user->username,
        $temp_user->password,
        $temp_user->email,
        $temp_user->type,
        $temp_user->comment
      );
      $current_user->insert_user_into_db();
      $_SESSION["account_created"] = true;
      unset($_SESSION['pin']);
      header("Location: "."..".DS."frontend".DS."signin.php");
    } catch (Exception $e) {
      $message = $e->getmessage();
    }
  }else{
    $message = "The PIN does not match! Try again";
  }
}//end of if checking isset($_POST['pin_send'])
?>
<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>AdminPin</title>
      <script type="text/javascript">
        function showMessage() {
            alert('A PIN is sent to your email address, please enter the PIN');
        }
      </script>
    </head>
    <body onLoad="showMessage()">
      <header>
        <h1>Pickaface</h1>
        <nav>
          <ul>
            <li>Please enter your PIN</li>
          </ul>
        </nav>
      </header>
    <div class="formdiv">
      <form method="post">
        <input type="number" name="pin" placeholder="PIN" required><br>
        <button type="submit" name="pin_send">Send</button>
      </form>
    </div>

    <nav style="background: lightgrey;">
      <ul>
        <li>Already a member, welcome! Please sign in</li>
        <li>
          <form method="post">
            <button type="submit" name="signin">Signin</button>
          </form>
        </li>
      </ul>
    </nav>
    <hr>
    <?php
    if(isset($current_user)){
      echo $current_user->first_name." To be commented out";
    }
    if(isset($message)){
      echo "<script>alert('".$message."')</script>";
    }
    echo $_SESSION['pin']." To be commented out";
    //unset($_SESSION['pin']);
    ?>
  </body>
</html>
