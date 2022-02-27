<?php
 session_start();
 echo "Log Out Successfully";
  session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>