<?php

session_save_path('/var/tmp'); 
if(isset($_SESSION['login_user'])){
	echo '<a href="logout.php"> <button id="login" type="button" class="btn btn-default navbar-right">Logout</button></a>';
}else{
echo '<a href="login.php"> <button id="login" type="button" class="btn btn-default">Login</button></a>';
}?>
