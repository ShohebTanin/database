<?php  session_start(); 

require "include/conn.php";
	
mysqli_query($conn, 'SET CHARACTER SET result utf8');
header("Content-Type: text/html; charset=utf-8");
	
$conn->query("SET NAMES 'utf8'"); 
$conn->query("SET CHARACTER SET utf8");  
mysqli_set_charset($conn, "utf8");

if(isset($_SESSION['admin_email']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location: ../index.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
        $email = $_POST['email'];
        $password = $_POST['password'];

            // user is already existed - error response
			
	$mysql_qry = "SELECT * FROM school_admins WHERE admin_email = '$email'";

	$result = mysqli_query($conn ,$mysql_qry);
	$rows = mysqli_num_rows($result);
	$rowsar = array();
	echo "here";
		if ($rows == 0) {
			echo "Nothing";
			
$_SESSION['update_status'] = "not registered yet";
echo '<script language="javascript">';
echo 'alert("Email not Found!!")';
echo '</script>';
header("Location:login.php");
		} else {

			while ($row2 = mysqli_fetch_assoc($result)) {
				$salt = $row2['salt'];
            $encrypted_password = $row2['encrypted_password'];
            $hash = base64_encode(sha1($password . $salt, true) . $salt);
            // check for password equality
				if ($encrypted_password == $hash) {
					// user authentication details are correct
			$_SESSION['admin_email']=$row2['admin_email'];
			$_SESSION['admin_name']=$row2['admin_name'];
			if($row2['permission']=="yes"){
				$_SESSION['main_admin']="active";
			}else{
				$_SESSION['main_admin']="inactive";
			}
$_SESSION['update_status'] = "Successfully Logged in. ";
			header("Location:../index.php"); 
				}else{
			
$_SESSION['update_status'] = "Email Or Password Not Matched!!";
echo '<script language="javascript">';
echo 'alert("Email Or Password Not Matched!!")';
echo '</script>';
header("Location:login.php");
				}				  
			}
		}
}
else{
	
echo '<script language="javascript">';
echo 'alert("Email Or Password Not Matched!!")';
echo '</script>';
header("Location:login.php");
$_SESSION['update_status'] = "error";
	
}
 ?>
