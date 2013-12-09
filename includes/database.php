<?php include('config.php') ?>

<?php 

	$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if($db->connect_errno) {
		echo 'Connectoin failed: ('.$db->connect_errno.')'.$db->connect_error;
	}
?>
