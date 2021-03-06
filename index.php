<?php
session_save_path('/var/tmp');
session_start();
$_POST['first'] = 'hello';
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
	<div id="info">
                <p> Welcome to the SCU Equivalents webpage! This site is designed to help applying graduate students find possible equivalents for SCU's foundation courses - courses that graduate students in SCU's MSCSE program are required to take before beginning graduate courses. Below you may search for courses that have already been approved as equivalents for SCU's foundation courses. </p>
                <h5 id="userinfo"> To find descriptions for SCU's foundation courses, click <a href="http://www.scu.edu/engineering/cse/g
rad/degrees.cfm"> here </a> </h5>
        </div>
	<div class="search-area col-md-3">
          <form method="post">
            <h5> Search Field: </h5>
              <?php include 'searchform.php'; ?> 
		<!--<input type="submit" class="btn btn-default" name="submit" value="Submit"> -->
	</form>
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') { 
              $ID = isset($_POST['ID']) ? $_POST['ID'] : false;
            }
            include 'phpsearch.php';
            ?>
            <div>
		<a id="clearBtn" href="index.php">Clear Form</a>
            <?php
              if(isset($_SESSION['login_user'])){
              echo '<a href="add.php"> <input type="submit" class="btn btn-default" value="Add Course" width="100px;"></input></a>';
              }
            ?>
          </div>
        </div> <!--end search area-->
     </div>
    </div>
	<p> The content of these web pages is not generate by and does not represent the view of Santa Clara University of any of its departments or organizations. </p> 
  </body> 
</html> 
