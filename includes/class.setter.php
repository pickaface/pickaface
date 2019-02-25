<?php
/**
 *
 */
abstract class Setter extends DBobject{

  function __construct($_attributes){
    parent::__construct($_attributes);
  }

  protected function _set_id($id){
    if($id == 0 || filter_var($id, FILTER_VALIDATE_INT)){
      $this->_attributes["id"] = $id;
    }else{
      throw new Exception("Not a valid id");
    }
  }


  protected function validate_sanitize_string($value){
    if(is_string($value)){
      return filter_var($value, FILTER_SANITIZE_STRING);
    }else{
      throw new Exception("Invalid String");
    }
  }


}



?>
