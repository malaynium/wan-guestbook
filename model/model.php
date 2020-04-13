<?php

// ## Guestbook table Model class ##

class AppModel {

    public function __construct() {
    $host = "localhost";
    $user = "fullstack";
    $password = "1234";
    $db = "wanGuestbook";

    $this->con = new mysqli($host,$user,$password, $db);

    if ( mysqli_connect_errno($this->con)) {
      "Failed to connect to MySQL: ".mysqli_connect_error();
    }
  }

  // ## Read data from guestbook table ##
  function read() {
    
    $q = "SELECT * "
      . "FROM `guestbook` "
      . "ORDER BY `id` DESC";
  
    $result = $this->con->query($q);

    mysqli_close($this->con);

    return $result;
    
  }
  
  // ## Insert new comment entry in to database ##
  function create($data) {

    $q = "INSERT INTO guestbook(`name`,`email`,`message`) "
      . "VALUES "
      . "('$data[name]', '$data[email]', '$data[message]')";
      
    if ( !$this->con->query($q) ) {

      //$result = 'false';  
      die('ERROR:' .mysqli_error($this->con));

    }  else {

      $result = 'true';

    }

    return $result;

  }

}


?>