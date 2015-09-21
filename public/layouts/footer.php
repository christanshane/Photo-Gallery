		</div>
		<div id ="footer">
			Copyright <?php echo date ("Y", time()); ?>,GRP4
		</div>
	</body>
</html>
<?php if(isset($database)){ $database->close_connection(); } ?>