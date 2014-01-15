<?php

  /**
   *
   * Config file
   *
   * The following variables need to be set in order to connect to the MySQL database:   * 
   * $hostname - hostname for the MySQL database
   * $user - username to log into the MySQL database
   * $password - password to log into the MySQL database
   *
   *
   * The $max_squares variable can be set by the user to define the maximum number
   * of squares allowed per player (default is 5)
   * 
   */
 
  $hostname = "";
  $user = "";
  $password = "";
  $link = mysqli_connect($hostname, $user, $password, "sbsquares");

  $max_squares = "5";
?>