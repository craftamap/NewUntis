<?php

class UntisKlasse {
  public $id;
  public $name;
  public $longName;
  //public $foreColor;
  //public $backcolor;

  function __construct (Array $ar = null) {
    if (isset($ar)) {
      $this->id = $ar["id"];
      $this->name = $ar["name"];
      $this->longName = $ar["longName"];
    }
  }
}



 ?>
