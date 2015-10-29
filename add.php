<?php
session_start();
echo 'started session';
if(!(isset($_SESSION['login_user']))){
	echo 'trying to redirect';
	header(  'Location: login.php');
}
?>

<!DOCTYPE HTML> 
<html> 
	<head> 
		<title> SCU Equivalents </title> 
		<!-- Latest compiled and minified CSS -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
	<div class="content" style="clear:both;"> 
		<form class="input-form col-md-12 col-md-offset-1" action="addCourse.php">
			<div class="form-group">
    			<label for="universy">University</label>
    			<input type="text" class="form-control" id="university">
    		</div>
    		<div class="form-group">
    				<label for="country">Country</label>
    				<input type="text" class="form-control" id="country">
    		</div>
    		<div class="form-group">
    			<label for="city">City</label>
    			<input type="text" class="form-control" id="city">
  			</div>
  			<div class="form-group">
    			<label for="course-title">Course Title</label>
    			<input type="text" class="form-control" id="course-title">
  			</div>
  			<div class="form-group">
    			<label for="course-name">Course Name</label>
    			<input type="text" class="form-control" id="course-name">
  			</div>
  			<div class="form-group" >
    			<label for="equivalent">Equivalent</label>
    			<input type="text" class="form-control" id="equivalent">
  			</div>
  			<div id="submit-button" class="col-md-3 col-md-offset-7">
  				<input type="submit" class="btn btn-default" style="float:left;">
			</div>
		</form>
	</div>
	</body> 
</html>
