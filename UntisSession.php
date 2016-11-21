<?php

require("UntisSessionHandler.php");
require("UntisKlasse.php");

Class UntisSession {

  private $server;
  private $username;
  private $password;
  private $school;
  private $client;

  private $id;

  private $isLogin;

  private $sessionId;

  function __construct ($server = null, $username = null, $password =null, $school =null, $client = null) {
    $this->id = "NewUntis ". $client . $_SERVER['REQUEST_TIME'];
  }

  function setServer ($s) {
    if(!$isLogin) {
      //checks, if input is valid
      if (is_string($s)) {
        if(filter_var($s, FILTER_VALIDATE_URL)) {
          //sets server-val of Server
          $this->server = $s;
        } else {
          throw new Exception("server is not a valid url", 1);

        }
      }
    } else {
      throw new Exception("You cannot change a value while you logged in", 0);

    }
  }


  function setUsername($u) {
    if(!$isLogin) {
        if(is_string($u)) {
          $this->username = $u;
        }
    } else {
      throw new Exception("You cannot change a value while you logged in", 0);

    }
  }

  function setPassword($p) {
    if(!$isLogin) {
        if(is_string($p)) {
          $this->password = $p;
        }
    } else {
      throw new Exception("You cannot change a value while you logged in", 0);

    }

  }

  function setSchool($s) {
    if(!$isLogin) {
        if(is_string($s)) {
          $this->school = $s;
        }
    } else {
      throw new Exception("You cannot change a value while you logged in", 0);

    }
  }


  function authenticate () {
    if($this->isLogin) {

      throw new Exception("Already logged in!", 1001);

    } else {
      if(isset($this->server)) {
        if(isset($this->username)) {
          if(isset($this->password)) {
            if(isset($this->school)) {

              $finalurl = $this->server."?school=".$this->school;

              //print($finalurl);

              $params = array();
              $params["user"] = $this->username;
              $params["password"] = $this->password;
              $params["client"] = $this->client;

              $sh = new UntisSessionHandler();
              $login_result = $sh->handle($finalurl, $params, "authenticate", $this->id);
              $login_resultde = json_decode($login_result, true);

              if($login_resultde["id"] == "error") {
                throw new Exception("Error, for more check the log", 1010);

              } else {
                //if true, everything went good
                if(isset($login_resultde["result"]["sessionId"])) {
                  $this->sessionId = $login_resultde["result"]["sessionId"];

                  $this->isLogin = true;
                  return true;
                }
              }

            } else {

            }
          } else {

          }
        } else {
          throw new Exception("username not set", 1003);

        }
      } else {
        throw new Exception("url not set", 1002);
      }
    }

  }

  function logout () {
    if($this->isLogin) {
      $finalurl = $this->server."?school=".$this->school;
      $params = array();
      $sh = new UntisSessionHandler();
      $logout_result = $sh->handle($finalurl, $params, "logout", $this->id, $this->sessionId);
      $logout_resultde = json_decode($logout_result,true);
      //print($logout_result);
      if($logout_resultde["id"] == "error") {
        throw new Exception("Error, for more check the log", 1010);

      } else {
        //if true, everything went good
        $this->isLogin = false;
        return true;
      }

    } else {
      throw new Exception("already logged out", 1);

    }
  }

  function getTeachers () {

  }

  function getStudents() {

  }

  function getKlassen($schoolyearId = NULL) {
    if($this->isLogin) {
      $finalurl = $this->server."?school=".$this->school;
      $params = array();
      if (isset($schoolyearId)) {
        $params["schoolyearId"] = $schoolyearId;
      }
      $sh = new UntisSessionHandler();
      $result = $sh->handle($finalurl, $params, "getKlassen", $this->id, $this->sessionId);
      $resultde = json_decode($result, true);
      if($resultde["id"] == "error") {
        throw new Exception("Error Processing Request", 1);

      } else {
        $retarray = array();
        foreach ($resultde["result"] as $key => $value) {
          $kl = new UntisKlasse($value);
          array_push($retarray, $kl);
        }
        return($retarray);
      }
    }
  }

  function getSubjects() {

  }

  function getRooms() {

  }

  function getDepartments () {

  }

  function getTimegridUntis() {

  }

  function getStatusData () {

  }

  function getCurrentSchoolyear () {

  }

  function getTimetable () {

  }

  function getLatestImportTime () {

  }

  function getPersonId () {

  }

  function getSubstitutions() {

  }

  function getClassregEvents() {

  }

  function getExams() {

  }

  function getExamTypes () {

  }

}

?>
