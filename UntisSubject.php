<?php
class UntisSubject {
  public $id;
  public $name;
  public $longName;
  public $foreColor;
  public $backColor;
  public $alternateName;
  public $active;

  function __construct($ar){
    if(is_array($ar)) {
      $this->id = $ar["id"];
      $this->name = $ar["name"];
      $this->longName = $ar["longName"];
      $this->foreColor = $ar["foreColor"];
      $this->backColor = $ar["backColor"];
      $this->alternateName = $ar["alternateName"];
      $this->active = $ar["active"];
    }
  }
}


 ?>
