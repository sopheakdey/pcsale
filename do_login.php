<?php
	
	$user = $_POST['username'];
	$pwd = $_POST['password'];
	if(isset($user) && isset($pwd)){
		include("includes/database.php");
		$sql = "SELECT * FROM tbl_user WHERE user_name='{$user}' AND user_pass='{$pwd}'";
		$res = $db->query($sql);
		if($res->num_rows > 0){
			session_start();
			$user = $res->fetch_array(MYSQLI_ASSOC);
			$_SESSION['user'] = $user['user_name'];
			$_SESSION['type']  = $user['user_type'];
			$_SESSION['id']  = $user['user_id'];
			header("Location: /");	
			exit();
		}else{
			header("Location: /");	
			exit();	
		}			
	} 
?>