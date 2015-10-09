<?php require_once("../../includes/initialize.php"); ?>
<?php
	$name = User::find_by_id($_GET['id']);
?>
<html>
	<head>
		<title> Profile | ArtDiscrete </title>
		<link href="../stylesheets/profile.css" rel="Stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="main-container">
			<header>
				<div class="header-container">
					
				</div>
			</header>
			<section>
				<div class="section-container">
					<div class="info-container">
						<div class="profilepicture">
							<a href="#loginScreen">
								<div class="onHover">
									Change photo 
								</div>
							</a>
						</div>
						<div class="name-holder">
								<p><?php echo $name->full_name() ?></p>
						</div>
						<div class="info-holder">
							<textarea readonly>
								<?=$profile['about'];?>
							</textarea>
						</div>
					</div>
					<div class="personal-container">
					</div>
					<div class="suggestions-container">

					</div>
				</div>
			</section>
		</div>
		<div id="loginScreen">
		    <a href="#" class="cancel">&times;</a>
		    <div class="loginpage">
		    </div>
		</div>
		<div id="cover">
		</div>
	</body>
</html>