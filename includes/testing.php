<?php
//This hile needs to be shifted to sandbox
require_once 'init.php';
try {
  $game1 = new Game([
    'id'=> 0,
    'category' => "action",
    'game_name' => "Tick Tack Toe",
    'game_description' => "This is the classis game...",
    'game_rules' => "<ul><li>rule1</li><li>rule2</li></ul>",
    'min_players' => 2,
    'max_players' => 2,
    'age_limit' => 4,
  ]);
  echo "<pre>";
  var_dump($game1);
  echo "</pre>";
} catch (Exception $e) {
  echo $e->getMessage();
}




?>
