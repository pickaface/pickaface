<?php
  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
  //dirname(dirname(dirname(__FILE__))) = /media/sf_zebbox/agora which is requied for the
  //following line of code
  //dirname($_SERVER['PHP_SELF'], 3) = /agora which is needed for URI used in redirection
  require_once P_ROOT.DS.'includes'.DS.'init.php';
  // if($_SERVER["HTTPS"] != "on"){//code to switch to https
  //     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  //     exit();
  // }
  require_once 'adminhead.php';
?>
<?php
  if (isset($_POST['submit'])) {
    $category=$_POST['category'];
    $game_name=$_POST['game_name'];
    $game_description=$_POST['game_description'];
    $game_rules=$_POST['game_rules'];
    $min_players=$_POST['min_players'];
    $max_players=$_POST['max_players'];
    $age_limit=$_POST['age_limit'];
    $comment=$_POST['comment'];

      ////////////Insert records with prepare statement with name placeholder//////////////

    $query="INSERT INTO games (category, game_name, game_description, game_rules, min_players, max_players, age_limit, comment)
    VALUES ( :category, :game_name, :game_description, :game_rules, :min_players, :max_players, :age_limit, :comment)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':game_name', $game_name, PDO::PARAM_STR);
    $stmt->bindParam(':game_description', $game_description);
    $stmt->bindParam(':game_rules', $game_rules);
    $stmt->bindParam(':min_players', $min_players, PDO::PARAM_INT);
    $stmt->bindParam(':max_players', $max_players, PDO::PARAM_INT);
    $stmt->bindParam(':age_limit', $age_limit, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

    $stmt->execute();

      /////////////////////Insert records with prepare statement with question mark////////////
       //
       // $query= "INSERT INTO games (category, game_name, game_description, game_rules, min_players, max_players, age_limit, comment)
       //      VALUES (?, ?, ?, ?, ?, ?, ?)";
       //
       // $stmt = $db->prepare($query);
       // $stm->execute(array($category, $game_name, $game_description, $game_rules, $min_players, $max_players, $age_limit, $comment));
     if ($stmt) {
        echo '<script language="javascript">';
        echo 'alert("New Game Inserted Successfully!!!")';
        echo '</script>';
     }
   }

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href=<?php echo "..".DS."styles".DS."master.css";?>>
  </head>
  <body>
    <center>
      <h1>Hello, Welcome Admin!!</h1>
    </center>
    <button type="button" id="gamebtn10" style="width:125px"> Add a Game</button>
      <div id="Modal10" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add a Game Form</h4>
            </div>
            <div class="signinmodal-body">
                <form method="POST" action="" >
                  <center>
                  Category:  <input type="text" name="category" placeholder="category"><br><br>
                  Game Name: <input type="text" name="game_name" placeholder="game_name"><br><br>
                  Game Description: <textarea name="game_description" rows="5" cols="50" placeholder="game_description..."></textarea><br><br>
                  Game Rules: <textarea name="game_rules" rows="5" cols="50" placeholder="game_rules..."></textarea><br><br>
                  Minimum no.of players: <input type="number" name="min_players" placeholder="min_players are 2"><br><br>
                  Maximum no.of players: <input type="number" name="max_players" placeholder="max_players are 6"><br><br>
                  Age_Limit to Play the Game: <input type="number" name="age_limit" placeholder="minimum age_limit is 4"><br><br>
                  Comment: <input type="text" name="comment" placeholder="comment...."><br><br>
                  <!-- <input type="number" name="admin_signin_pin" placeholder="PIN" required><br><br> -->
                  <button type="submit" name="submit">Add Game</button>
                </center>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>

<?php require_once 'adminfoot.php'; ?>
