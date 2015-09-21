<?php
	require_once(LIB_PATH.DS."initialize.php");

	if($session->is_logged_in()){
		redirect_to("index.php");
	}
	
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		$found_user = User::authenticate($username, $password);
		
		//check if pw and un exist
		if($found_user){
			$session->login($found_user);
			redirect_to("index.php");
		}else{
			$message = "Username/password combination incorrect.";
		}
	}else{
	//form has not been submitted
		$username="";
		$password="";
	}
?>
<html>
	<head>
		<title>Photo Gallery</title>
		<link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		<div id="header">
			<h1>Photo Gallery</h1>
		</div>
		<div id ="main">
		<h2>Admin</h2>
		<?php echo output_message($message); ?>
		
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" maxlength="30"
							value="<?php echo htmlentities($username); ?>"/>
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="password" maxlength="30"
							value="<?php echo htmlentities($password); ?>"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Login"/>
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div id ="footer">
			Copyright <?php echo date ("Y", time()); ?>,GRP4
		</div>
	</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>