<?php 
session_start(); 

require "include/conn.php";
	
mysqli_query($conn, 'SET CHARACTER SET result utf8');
header("Content-Type: text/html; charset=utf-8");
	
$conn->query("SET NAMES 'utf8'"); 
$conn->query("SET CHARACTER SET utf8");  
mysqli_set_charset($conn, "utf8");

if(isset($_SESSION['admin_email']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:index.php"); 
 }
 else{
	 
	 $mysql_qry = "select * from `school_front_page`";
            
	

	$result_for_use;
	$result = mysqli_query($conn ,$mysql_qry);
	$rows = mysqli_num_rows($result);
	$rowsar = array();
		if ($rows == 0) {
			echo "Nothing";
		} else {

			while ($row2 = mysqli_fetch_assoc($result)) {
				$result_for_use = $row2;
			}
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo.png" rel="icon">
  <title>School Admin - Login</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/school-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    
	
	
    <div id="content-wrapper" class="d-flex flex-column" style="min-height: 100vh;>
      <div id="content">


        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-5">
                    
					<div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user"  action="login_process.php"  method="post">
                    <div class="form-group">
                      <?php if(isset($_SESSION['login_error']))echo $_SESSION['login_error']; ?>
                    </div>
					<div class="form-group">
					<dt for="text" class="text-info">Email:</dt>
                                
                      <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="">
                    </div>
                    <div class="form-group">
					<dt for="text" class="text-info">Password:</dt>
                                
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck"style="color: black;">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="login" class="btn btn-primary btn-block" value="Submit">
                    </div>
                    <hr>
                    
                  </form>
                </div>
					
					
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
		
		
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/school-admin.min.js"></script>
</body>

</html>

<?php
 }
?>