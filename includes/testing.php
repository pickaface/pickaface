<?php
//This hile needs to be shifted to sandbox
require_once 'init.php';
try {
  $dummy = new Dummy(["id"=>0, "dummy1"=>"alpha", "dummy2"=>"beta"]);
  echo "<pre>";
  print_r($dummy);
  echo "</pre>";
  echo "-------------<br>";
  $dummy->insert_into_table();
  echo "<pre>";
  print_r($dummy);
  echo "</pre>";
} catch (Exception $e) {
  echo $e->getMessage();
}




?>
