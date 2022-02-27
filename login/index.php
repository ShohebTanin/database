<?php
 session_start();
 
 require "include/conn.php";
	
	
mysqli_query($conn, 'SET CHARACTER SET result utf8');
header("Content-Type: text/html; charset=utf-8");
	
$conn->query("SET NAMES 'utf8'"); 
$conn->query("SET CHARACTER SET utf8");  
mysqli_set_charset($conn, "utf8");
$findfrom= "Tutor";
$use;

if(isset($_SESSION['admin_email']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
	 echo "You are Logged In";
	 header("Location: ../index.php");
 }
 else{
	 
	 header("Location: login.php");
 }

?>