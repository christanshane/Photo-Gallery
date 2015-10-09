<?php require_once("../../includes/initialize.php"); ?>
<?php

	// 1. the current page number ($current_page)
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

	// 2. records per page ($per_page)
	$per_page = 6;

	// 3. total record count ($total_count)
	$total_count = Photograph::count_all();

	// Find all photos
	$pagination = new Pagination($page, $per_page, $total_count);

	// Find the record for this page
	$sql = "SELECT * FROM photographs ";
	$sql .= "LIMIT {$per_page} ";
	$sql .= "OFFSET {$pagination->offset()}";
	$photos = Photograph::find_by_sql($sql);

	// Need to all ?page=$page to all links we want to
	// maintain the current page

?>
<html>
	<head>
		<title>Public Images | ArtDiscrete</title>
		<link href="../stylesheets/gridstyle.css" rel="Stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<div class="logo-holder">

			</div>
			<div class="nav-holder">
				<div class="nav-wrapper">
					<div class="button">
						<a href="profile.php"><span> My Profile </span></a>
					</div>
					<div class="button">
						<a href="about.php"><span> About </span></a>
					</div>
					<div class="button">
						<a href="index.php"><span> Public Images </span></a>
					</div>
				</div>
			</div>
		</header>
		<div class="gridview">
			<div class="grid">
				<?php foreach($photos as $photo): ?>
					<div class="picture">
						<a href="../photo.php?id=<?php echo $photo->id; ?>">
						<img src="../<?php echo $photo->image_path(); ?>" width="200" />
						</a>
					</div>
				<?php endforeach;?>
				<div class="pagination" style="clear: both;">
				<?php 
					if($pagination->total_pages() > 1){
						if($pagination->has_previous_page()){
							echo " <a href=\"index.php?page=";
							echo $pagination->previous_page();
							echo "\">&laquo; Previous</a> ";
						}

						for($i=1; $i <= $pagination->total_pages(); $i++){
							if($i == $page){
								echo " <span class=\"selected\">{$i}</span> ";
							}else{
								echo "<span class=\"not_selected\"> <href=\"index.php?page={$i}\">{$i}</span></a> ";
							}
						}

						if($pagination->has_next_page()){
							echo " <a href=\"index.php?page=";
							echo $pagination->next_page();
							echo "\">Next &raquo:</a> ";
						}
					}
				?>
				</div>
			</div>
		</div>
			
		</div>
	</body>
</html>