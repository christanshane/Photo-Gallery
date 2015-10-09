<?php require_once("../includes/initialize.php"); ?>
<?php if(!$session->is_logged_in()){ redirect_to("admin/login.php"); } ?>
<html>
	<head>
		<title>Public Images | ArtDiscrete</title>
		<link href="stylesheets/loginstyle.css" rel="Stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<div class="logo-holder">

			</div>
			<div class="nav-holder">
				<div class="nav-wrapper">
					<div class="button">
						<a href="index.php"><span> Home </span></a>
					</div>
					<div class="button">
						<a href="about.php"><span> About </span></a>
					</div>
					<div class="button">
						<a href="admin/index.php"><span> Public Images </span></a>
					</div>
		</header>
		</div>
	</body>
</html>