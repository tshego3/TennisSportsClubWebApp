<?php // Example 26-4: index.php
  session_start();
  require_once 'header.php';

  echo "<div class='center'>Welcome to Tennis Sports Center,";

  if ($loggedin) echo " $user, you are logged in";
  else           echo ' please log in';

?>
