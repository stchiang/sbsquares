<?php

  /**
   *
   * Config file for MySQL database
   *
   * The following variables need to be set in order to connect to the MySQL database:
   *
   * $hostname - hostname for the MySQL database
   * $user - username to log into the MySQL database
   * $password - password to log into the MySQL database
   *
   */

  $hostname = "";
  $user = "";
  $password = "";
  $link = mysqli_connect($hostname, $user, $password, "sbsquares");
?>