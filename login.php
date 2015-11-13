<?php
session_save_path('/webpages/ebeckman/COEN174/sessions');
session_start();
$error='';
if(isset($_POST['submit'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "Please enter both fields";
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$connection = mysqli_connect("dbserver.engr.scu.edu", "crohacz", "00000896245");
	
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		$db = mysqli_select_db($connection, "sdb_crohacz");
		
		$query = mysqli_query( $connection, "select * from users where password='$password' AND username='$username'");
		$rows = mysqli_num_rows($query);
		if($rows == 0){
			$error = "Username or Password is invalid";
		}else {
			$_SESSION['login_user']=$username;
			header("location: header.php");
		}
		mysqli_close($connection);
		
	}
}
if(isset($_SESSION['login_user'])){
	header("location: index.php");
}
?>

<!DOCTYPE HTML> 
<html> 
	<head> 
		<title> SCU Equivalents </title> 
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="/js/script.js"></script>
	</head> 
	
	<body> 
	<nav class="navbar navbar-default"> 
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<img id="logo" alt="Brand" src="https://cloud.githubusercontent.com/assets/4735087/10567984/20b70294-75c6-11e5-941f-efffff4745bb.png"> 
					<?php
					include('loginbutton.php');
					?>
				</a>
			</div>
	</nav>
	<div class="container">
  		<form class="form-signin" action="" method = "post">
    		<h2 class="form-signin-heading">Login</h2>
				<input name="username" id="username" type="text" class="input-block-level" placeholder="Username">
				<input name="password" id="password" type="password" class="input-block-level" placeholder="Password">
				<input name="submit" type="submit" class="btn btn-primary" value="Submit">
				<span><?php echo $error; ?></span>
		</form>
	</div>
	</body> 
</html>
