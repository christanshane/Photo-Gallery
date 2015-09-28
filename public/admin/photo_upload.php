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
			$message = "Photograph uploaded successfully."
			redirect_to("list_photos.php");
		}else{
			// Failure
			$message = join("<br />", $photo->errors);
		}
	}
?>
<?php include_layout_template('admin_header.php'); ?>
	<h2>Photo Upload</h2>
	<?php echo output_message($message); ?>
	<form action="photo_upload.php" ecntype="multiple/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<p><input type="file" name="file_upload" /></p>
		<p>Caption: <input type="text" name="caption" value="" /></p>
		<input type="submit" name="submit" value="Upload" />
	</form>

<?php include_layout_template('admin_footer.php'); ?>




<?php
	// In an application this could be moved to a config file
	$upload_errors = array(
		UPLOAD_ERR_OK => "No errors.",
		UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL => "Partial upload.",
		UPLOAD_ERR_NO_FILE => "No file.",
		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
		UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
	);

	if(isset($_POST['submit'])){
		// process the form data
		$tmp_file = $_FILES['files_upload']['temp_name'];
		$target_file = basename($_FILES['files_upload']['name']);
		$upload_dir = "uploads";
		if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)){
			$message = "File uploaded succesfully!";
		}else{
			$error = $_FILES['files_upload']['error']);
	$message = $upload_errors[$error];
		}
	}

	$error = $_FILES['file_upload']['error'];
	$message = $upload_errors[$error];
?>