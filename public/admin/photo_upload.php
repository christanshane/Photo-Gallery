<?php
	require_once("../../includes/initialize.php");

	if (!$session->is_logged_in()){ redirect_to("login.php"); }
?>
<?php
	$max_file_size = 1048576;
	if(isset($_POST['submit'])){
		$photo = new Photograph();
		$photo->caption = $_POST['caption'];
		$photo->attach_file($_FILES['file_upload']);
		if($photo->save()){
			// Success
			$message = "Photograph uploaded successfully.";
		}else{
			// Failure
			$message = join("<br />", $photo->errors);
		}
	}
?>

<html>
<head>
		<title>Profile | ArtDiscrete</title>
		<link href="../stylesheets/profilestyle.css" rel="Stylesheet" type="text/css"/>
	</head>
<body>
	<div class="container">
		<div id="display">
			<form action="photo_upload.php" enctype="multipart/form-data" method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
				<p>Caption: <input type="text" name="caption" value="" /></p>
				<p><input type="file" name="file_upload" /></p>
				<input type="submit" name="submit" value="Upload" />
			</form>
			<div id="avatar">
				<img src="../<?php echo $photo->image_path(); ?>" height="150" width="150" />
			</div>
		</div>
	</div>
	
</body>
</html>