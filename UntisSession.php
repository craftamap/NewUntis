<?php

require("UntisSessionHandler.php");

Class UntisSession {

  private $server;
  private $username;
  private $password;
  private $school;
  private $isLogin;

  private $sessionId;

  function __construct ($server = "", $username = "", $password ="", $school ="") {

  }

  function setServer (String $s) {
    //checks, if input is valid
    if (is_string($s)) {
      if(filter_var($s, FILTER_VALIDATE_URL)) {
        //sets server-val of Server
        $this->server = $s;
      } else {
        throw new Exception("server is not a valid url", 1);

      }
    }
  }

  function setUsername(String $u) {
    $this->username = $u;
  }

  function setPassword(String $p) {
    $this->password = $p;
  }

  function setSchool(String $s) {
    $this->school = $s;
  }


  function login () {

  }

  function logout () {

  }

  function getTeachers () {

  }

  function getStudents() {

  }

  function getKlassen() {

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
