<?php
/**
 *
 */
abstract class Chat extends Setter{
  protected $_attributes = array(
    "chatid" => 0,
    "chatuserid" => 0,
    "chattext" => "NUN",
    "chattextgameid" => 0
  );

  ///////////////////////setters beyond this line///////////////////////////

  protected function _set_chatid($chatid){
    if($chatid == 0 || filter_var($chatid, FILTER_VALIDATE_INT)){
      $this->_attributes["chatid"] = $chatid;
    }else{
      throw new Exception("Not a valid chatid");
    }
  }

  protected function _set_chatuserid($chatuserid){
    if($chatuserid == 0 || filter_var($chatuserid, FILTER_VALIDATE_INT)){
      $this->_attributes["chatuserid"] = $chatuserid;
    }else{
      throw new Exception("Not a valid chatuserid");
    }
  }


  protected function _set_chattext($chattext){
    if(trim($chattext) != ""){
      $this->_attributes["chattext"] = filter_var($chattext, FILTER_SANITIZE_STRING);
    }else{
      throw new Exception("Not a valid chattext");
    }
  }

  protected function _set_chattextgameid($chattextgameid){
    if($chattextgameid == 0 || filter_var($chattextgameid, FILTER_VALIDATE_INT)){
      $this->_attributes["chattextgameid"] = $chattextgameid;
    }else{
      throw new Exception("Not a valid chatuserid");
    }
  }



}//end of class




?>
