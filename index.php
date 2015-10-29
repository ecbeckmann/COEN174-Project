<?php
session_start();
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
		<div class="container-fluid">
			<div class="row">
			
		  <?php
			if(isset($_SESSION['login_user'])){
				echo '<a href="add.php"> <button id = "add" type="button" class="btn btn-success btn-lg">Add</button></a>';
			}
			?>
			</div>
			<div class="row">
				<div class="search-area col-md-3">
					<h5> Search Field: </h5>
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search..." />
							<span class="input-group-btn">
								<button class="btn btn-info" type="button">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
            </div>
            <div>
              <h6> University </h6>
              <select class="dropdown" name="university">
    							<option value="volvo">Indian Institute of Technology Bombay</option>
   								<option value="saab">Indian Institute of Technology Kharagpur </option>
    							<option value="fiat">Universiy of Delhi</option>
    							<option value="audi">University of Hyderbad</option>
  							</select>
  					</div>
  					<div>
  						<h6> Course Name </h6>
              <select class="dropdown" name="course-name">
    						<option value="volvo">Algorithms</option>
   							<option value="saab">Data Structures</option>
    						<option value="fiat">Operating Systems</option>
    						<option value="audi">Security</option>
  						</select>
  					</div>
  					<div>
  						<h6> Course number </h6>
              <select class="dropdown" name="course-number">
    						<option value="volvo">CS 20</option>
   							<option value="saab">CSE 45</option>
    						<option value="fiat">IT 200</option>
    						<option value="audi">INS 40</option>
  						</select>
  					</div>
  					<div>
  						<h6> SCU Equivalents</h6>
              <select class="dropdown" name="course-number">
    						<option value="volvo">COEN 140</option>
   							<option value="saab">COEN 170</option>
    						<option value="fiat">COEN 115</option>
    						<option value="audi">COEN 12</option>
  						</select>
  					</div>
          </div>
          <input type="submit">
				</div> <!--end search area-->
			<div class="content col-md-9"> 
					<h3> To find desciriptions for SCU's foundation courses, click <a href="http://www.scu.edu/engineering/cse/grad/degrees.cfm"> here </a> </h3>
          <?php 
            include 'newconnection.php';
          ?>
			</div>
		 </div>
		</div>
	</body> 
</html> 
