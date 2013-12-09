<?php  
	include("includes/database.php");
	if(isset($_POST['btnadd'])){
		$mname = strtolower($_POST['mname']);
		if($mname != null){
		$sql = "INSERT INTO tbl_model(model_name) VALUES('".$mname."')";
		$db->query($sql);
		}
		header('Location: newproduct.php?page=newproduct');
	}
?>