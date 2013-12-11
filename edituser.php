<?php 
	$title='Edit User';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_user WHERE user_id={$id}";
	$res = $db->query($sql);
	$user = $res->fetch_array(MYSQLI_ASSOC);
?>
	
<a class="menu-toggler" id="menu-toggler" href="#">
	<span class="menu-text"></span>
</a>
<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>
						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>
						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>
						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>
				</div>

				<ul class="nav nav-list">
					<li>
						<a href="home.php">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
					<li>
						<a href="product.php?page=product">
							<i class="icon-th-large"></i>
							<span class="menu-text"> Product </span>
                        </a> 
					</li>
					<li>
						<a href="customer.php?page=customer">
							<i class="icon-user-md"></i>
							<span class="menu-text"> Customer </span>
						</a>
					</li>
                    <li>
						<a href="sale.php?page=sale">
							<i class="icon-shopping-cart"></i>
							<span class="menu-text"> Sale </span>
                        </a> 
					</li>
					<li>
						<a href="report.php?page=report">
							<i class="icon-file-text"></i>
							<span class="menu-text"> Report </span>
						</a>
					</li>
                    <li>
						<a href="user.php?page=user">
							<i class="icon-user"></i>
							<span class="menu-text"> User </span>
						</a>
					</li>
				</ul>

			</div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-dashboard"></i>
                <a href="/">Dashboard</a>
        
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li><a href="user.php?page=user">User</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">Edit User</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Edit User </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        	<form action="" method="post"  data-validate="parsley" role="form" id="form">
	        	<div class="span12">
	        		<div class="span6">
						<div class="control-group">
							<input type="hidden" value="<?php echo $user['user_id']?>" name="id">
							<label class="control-label" for="user">User<span class="require">*</span></label>
							<div class="controls">
								<input type="text" value="<?php echo $user['user_name']?>" id="user" name="user" placeholder="enter user" class="span10 required" data-notblank="true" placeholder="Enter user" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter user">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="pass">Password <span class="require">*</span></label>
							<div class="controls">
								<input type="password" value="<?php echo $user['user_pass']?>" id="pass" name="pass" placeholder="enter password" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter password" data-equalto="#pass">
							</div>
						</div>
						
	        		</div>
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="usertype">User Type <span class="require">*</span></label>
							<div class="controls">
								<select name="usertype" id="usertype" class="span10 required" data-required="true" data-required-message="No user type selection">
									<option value="">No user type selection</option>
									<option value="admin" <?php if($user['user_type'] == 'admin'){?> selected <?php } ?>>admin</option>									
									<option value="user" <?php if($user['user_type'] == 'user'){?> selected <?php } ?>>user</option>
									
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="retype_pass">Re-type Password <span class="require">*</span></label>
							<div class="controls">
								<input type="password" value="<?php echo $user['user_pass']?>" id="retype_pass" placeholder="enter re-type password" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter re-type password" data-equalto="#pass" data-equalto-message="The password does not match"	>
							</div>
						</div>
	        		</div>
	        	</div>
	        	<div class="clear"></div>
	        	<div>
	        		<div class="span6">
			        	<div class="control-group">
							<a class="btn btn-danger btn-mini" href="user.php?page=user"><i class="icon-reply mr"></i>Back to list</a>
							<button type="submit" class="btn btn-primary btn-mini" name="btnsave"><i class="icon-save mr"></i>Save</button>	
							
						<div>
					</div>
	        	</div>
        	</form>
        </div>
    </div>
</div>
<?php
	if(isset($_POST['btnsave'])){
		$id = $_POST['id'];
		$user = strtolower($_POST['user']);
		$pass = strtolower($_POST['pass']);
		$usertype = strtolower($_POST['usertype']);

		$sql = "UPDATE tbl_user SET user_name = '".$user."', user_pass = '".$pass."', user_type = '".$usertype."' WHERE user_id = '".$id."'";
		$db->query($sql);
		header("Location: user.php?page=user");	
	}
?> 


<?php include('includes/footer.php'); ?>