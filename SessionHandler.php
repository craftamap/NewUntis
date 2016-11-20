<?php
class SessionHandler {

    function __construct () {

    }

    function handle (String $url,Array $params,String $method,String $id,String $jsessionId = null) {

      $postfield = array();
      $postfield["id"] = $id;
      $postfield["method"] = $method;
      $postfield["params"] = $params;
      $postfield["jsonrpc"] = "2.0";

      $postfieldjs = json_encode($postfield);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postfieldjs);

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($postfieldjs))
        );
      curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
      //If there is an jsessionid, set as cookie
      if(isset($jsessionId)) {
        curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=".$jsessionId);
      }
    }

}


 ?>
