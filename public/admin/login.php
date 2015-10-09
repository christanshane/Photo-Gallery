<?php
	require_once("../../includes/initialize.php");
	// Remember to give your form's submit tag a name="submit" attribute!
	if (isset($_POST['submit'])) { // Form has been submitted.
	  $username = trim($_POST['username']);
	  $password = trim($_POST['password']);
	  
	  // Check database to see if username/password exist.
		$found_user = User::authenticate($username, $password);
		
	  if ($found_user) {
	    $session->login($found_user);
			log_action('Login', "{$found_user->username} logged in.");
			echo "Found result!";
			header("location: ../about.php?username=" .$uname . "&note=success"); 	
	    redirect_to("../index.php");
	  } else {
	    // username/password combo was not found in the database
	    echo "No Result!";
	  }
	  
	} else { // Form has not been submitted.
	  $username = "";
	  $password = "";
	}
?>

<html>
	<head>
		<title>Login | ArtDiscrete</title>
		<link href="../stylesheets/loginstyle.css" rel="Stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<div class="logo-holder">

			</div>
			<div class="nav-holder">
				<div class="nav-wrapper">
					<div class="button">
						<a href="../admin/index.php"><span> Home </span></a>
					</div>
					<div class="button">
						<a href="../admin/about.php"><span> About </span></a>
					</div>
					<div class="button">
						<a href="../admin/changelog.php"><span> Updates </span></a>
					</div>
					<div class="button">
						<a href="../admin/register.php"><span> Register </span></a>
					</div>
					<div class="button">
							<div class="login">
								<a href="#loginScreen">Login </a>
							</div>
					</div>
				</div>
			</div>
		</header>
		<div id="loginScreen">
		    <a href="#" class="cancel">&times;</a>
		    <div class="loginpage">
		    	<div class="logindesc">
		    		Log In to ArtDiscrete
		    		<hr />
		    	</div>
		    	<div class="loginholder">
		    		<form method="POST" action="login.php">
			    		<input type="text" name="username" class="input" placeholder="Username" required/>
			    		<input type="password" name="password" class="input" placeholder="Password" required/>
			    		<input type="submit" name="submit" value="Login" id="submit" class="loginbutton"/>
			    		<br>
		    		</form>
		    	</div>
		    </div>
		</div>
		<div id="cover">
		</div>
	</body>
</html>