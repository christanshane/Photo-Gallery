		</div>
		<div id ="footer">
			Copyright <?php echo date ("Y", time()); ?>, Art Discrete</div>
	</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>