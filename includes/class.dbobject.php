<?php
/**
 *
 */
abstract class DBobject{
  function __construct($arguments){//$arguments is an associative array
    try {
      foreach ($arguments as $key => $value) {
        $this->__set($key, $value);
      }
    } catch (Exception $e) {
      throw $e;
    }
  }


  public function get_all_attributes(){
    return $this->_attributes;
  }

///////////////////////DB Related Functions/////////////////////////
//insert_into_table() inserts the current object into corresponding db table
public function insert_into_table(){
  global $db;
  //$sql1 = "INSERT INTO " . static::$_table." (";
  $sql1 = "INSERT INTO " . "dummy"." (";
  $sql2 = ") VALUES (";
  $value_array = array();

  foreach ($this->_attributes as $key => $value) {
    if($key != "id"){
      $sql1 .= $key . ", ";
      $sql2 .= "?, ";
      $value_array[] = $value;//array_push($value_array, $value);//does not work with an initially empty array
    }
  }
  $sql1 = substr($sql1, 0, -2);
  $sql2 = substr($sql2, 0, -2);
  $sql = $sql1 . $sql2 .")";
  try {
    $statement = $db->prepare($sql);
    if($db->errorInfo() == null ){
      throw new Exception(serialize($db->errorInfo()));
    }//we need to check it what is happening in this if
    $db->beginTransaction();
    $statement->execute($value_array);
    $this->_attributes["id"] = $db->lastInsertId();//to get the id of newly created entry
    $db->commit();
    return $this;
  } catch (PDOException $e) {
    throw $e;
  }
}
//////////////The following normally commented function is for debugging purposes/////
//   public function insert_into_table(){
//   global $db;
//   $sql1 = "INSERT INTO " . static::$_table . " (";
//   $sql2 = ") VALUES (";
//
//   foreach ($this->_attributes as $key => $value) {
//     if($key != "id"){
//       $sql1 .= $key . ", ";
//       if($key != "password"){
//         $sql2 .= $db->quote($value) . ", ";
//       }else{
//         $sql2 .= "'" . $value . "', ";
//       }
//     }
//   }
//   $sql1 = substr($sql1, 0, -2);
//   $sql2 = substr($sql2, 0, -2);
//   $sql = $sql1 . $sql2 . "); ";
//
//   try {
//     return $sql;//this line is for testing purposes
//     $db->beginTransaction();
//     $db->my_exec($sql);
//     $this->_attributes["id"] = $db->lastInsertId();
//     $db->commit();
//   } catch (Exception $e) {
//     throw $e;
//   }
// }


///////////////////////Grabage below this line///////////////////////


  //realizes an object array from db entries, returns an array
  //$order_columns must be a 2D array with column_name and ASC|DESC pairs
  protected static function instanciate_array_from_db_detailed($key_value_pairs, $order_columns){
    global $db;
    try {
      $results = self::return_existing_db_enties_detailed($key_value_pairs, $order_columns);
      if($results->rowCount() > 0){
        $object_array = [];
        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
          $class = get_called_class();
          $new_object = new $class(array_filter($row, function($var){return !is_null($var);}));//workd even without the filter function
          $object_array[] = $new_object;
        }
        return $object_array;
      }elseif($results->rowCount() == 0){
        throw new Exception("No such DB Entry");
      }
    } catch (Exception $e) {
      throw $e;
    }
  }

  //realizes an object array from db entries, returns an array
  protected static function instanciate_array_from_db($key_value_pairs){
    global $db;
    try {
      $results = self::return_existing_db_enties($key_value_pairs);
      if($results->rowCount() > 0){
        $object_array = [];
        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
          $class = get_called_class();
          $new_object = new $class(array_filter($row, function($var){return !is_null($var);}));//workd even without the filter function
          $object_array[] = $new_object;
        }
        return $object_array;
      }elseif($results->rowCount() == 0){
        throw new Exception("No such DB Entry");
      }
    } catch (Exception $e) {
      throw $e;
    }
  }

  // public function testing(){
  //   return get_called_class();
  // }

  //realizes an object from db entries, when there is a unique result
  public function instanciate_from_db($key_value_pairs){
    global $db;
    try {
      $results = $this->return_existing_db_enties($key_value_pairs);
      if($results->rowCount() == 1){
        $row = $results->fetch(PDO::FETCH_ASSOC);
        foreach ($row as $key => $value) {
          $this->_attributes[$key] = $value;
        }
      }elseif($results->rowCount() == 0){
        //throw new Exception("No such DB Entry ". debug_backtrace()[1]['function']);
        throw new Exception("No such DB Entry ");
      }elseif($results->rowCount() > 1){
        throw new Exception("Multiple DB Entries");
      }
    } catch (Exception $e) {
      throw $e;
    }
  }

  //$order_columns must be a 2D array with column_name and ASC|DESC pairs
  protected static function return_existing_db_enties_detailed($key_value_pairs, $order_columns){
    global $db;
    $value_array = array();
    $sql = "SELECT * FROM " . static::$_table;
    if(!empty($key_value_pairs)){
      $sql .= " WHERE ";
      foreach ($key_value_pairs as $key => $value) {
          $sql .= $key."=?";
          $sql .= " AND ";
          $value_array[] = $value;
        }
          $sql = substr($sql, 0, -5);
      }
      if(!empty($order_columns)){
        $sql .= " ORDER BY ";
        foreach ($order_columns as $value) {
          $sql .= $value[0] . " " . $value[1] . ", ";
        }
        $sql = substr($sql, 0, -2);
      }

      $sql .= ";";
      $statement = $db->prepare($sql);
      try {
        $statement->execute($value_array);
        return $statement;
      } catch (Exception $e) {
        throw $e;
      }
    }

  protected static function return_existing_db_enties($key_value_pairs){
    global $db;
    $value_array = array();
    $sql = "SELECT * FROM " . static::$_table;
    if(!empty($key_value_pairs)){
      $sql .= " WHERE ";
      foreach ($key_value_pairs as $key => $value) {
          $sql .= $key."=?";
          $sql .= " AND ";
          $value_array[] = $value;
        }
          $sql = substr($sql, 0, -5);
      }
        $sql .= ";";
        $statement = $db->prepare($sql);
        try {
          $statement->execute($value_array);
          return $statement;
        } catch (Exception $e) {
          throw $e;
        }
    }

  public function modify_all_attributes($key_value_pairs){
      try {
        foreach ($key_value_pairs as $key => $value) {
          if($key != "id"){
            $this->modify_an_attribute($key, $value);
          }
        }
      } catch (Exception $e) {
        throw $e;
      }
  }

  //modify_an_attribute() modifies the attribute and existing db record
  public function modify_an_attribute($key_to_change, $new_value){
      global $db;
        if($key_to_change == "id"){
          throw new Exception("Cannot change the id");
        }elseif($this->_attributes["id"] == 0){
          throw new Exception("This object is not yet inserted into DB");
        }
        try {
          $this->__set($key_to_change, $new_value);
          $sql  = "UPDATE ".static::$_table." SET {$key_to_change}= ? WHERE id={$this->_attributes['id']};";
          $statement = $db->prepare($sql);
          $statement->execute([$this->_attributes[$key_to_change]]);
      } catch (Exception $e) {
        throw $e;
      }
    }

    protected static function _modify_an_attribute_static($key_to_find, $value_to_find, $key_to_change, $value_to_change){
      global $db;
      if($key_to_change == "id"){
        throw new Exception("Cannot change the id");
      }
      try {
        $sql  = "UPDATE ".static::$_table." SET {$key_to_change}= ? WHERE {$key_to_find}='{$value_to_find}';";
        $statement = $db->prepare($sql);
        $statement->execute([$value_to_change]);
      } catch (Exception $e) {
        throw $e;
      }
    }




}




?>
