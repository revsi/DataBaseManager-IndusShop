<?php
   session_start(); //starts the session
   if($_SESSION['user']){ 
   header("location: home.php");// checks if the user is logged in  
   }
   else{
      header("location: login.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
<html lang="en">
<?php
include "head.php";
?>
<body>
<div class="container">
	<header>
		<div class="logo" >Indus Shop Database Management</div>
		<nav class="float-right">
			<div class="pure-menu pure-menu-open pure-menu-horizontal">
    		<ul>
       	 	<li><a href="login.php">Login</a></li>
       	 	<li><a href="register.php">Register</a></li>
    		</ul>
    		</div>
		</nav>
	</header>
	<?php
	echo "<p>Hello World!</p>";
	?> 
<?php
include "footer.php";
?>
    </div>
    </body>
</html>
