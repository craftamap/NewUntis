<?php

class UntisRoom {
  public $id = 0;
  public $name = "";
  public $longName = "";
  public $active = true;
  public $building = "";
  public $did = -1;


  function __construct(Array $ar = null) {
    if(isset($ar)) {
      $this->id = $ar["id"];
      $this->name = $ar["name"];
      $this->longName = $ar["longName"];
      $this->active = $ar["active"];
      $this->building = $ar["building"];
      if(isset($ar["did"])) {
        $this->did = $ar["did"];
      }
    }
  }
}



 ?>
