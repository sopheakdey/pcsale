<?php 
	$title='New User';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php'); 
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
						<a href="/">
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
                <i class="icon-home home-icon"></i>
                <a href="/">Home</a>
        
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li><a href="user.php?page=user">User</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">New User</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> New User </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        	<form action="" method="post"  data-validate="parsley" role="form" id="form">
	        	<div class="span12">
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="user">User<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="user" name="user" placeholder="enter user" class="span10 required" data-notblank="true" placeholder="Enter user" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter user">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="pass">Password <span class="require">*</span></label>
							<div class="controls">
								<input type="password" id="pass" name="pass" placeholder="enter password" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter password" data-equalto="#pass">
							</div>
						</div>
						
	        		</div>
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="usertype">User Type <span class="require">*</span></label>
							<div class="controls">
								<select name="usertype" id="usertype" class="span10 required" data-required="true" data-required-message="No user type selection">
									<option value="">No user type selection</option>
									<option value="admin">admin</option>
									<option value="user">user</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="retype_pass">Re-type Password <span class="require">*</span></label>
							<div class="controls">
								<input type="password" id="retype_pass" name="retype_pass" placeholder="enter re-type password" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter re-type password" data-equalto="#pass" data-equalto-message="The password does not match"	>
							</div>
						</div>
	        		</div>
	        	</div>
	        	<div class="clear"></div>
	        	<div>
	        		<div class="span6">
			        	<div class="control-group">
							<a class="btn btn-danger btn-mini" href="user.php?page=user"><i class="icon-reply mr"></i>Back to list</a>
							<button type="submit" class="btn btn-primary btn-mini" id="btnsave" name="btnsave"><i class="icon-save mr"></i>Save</button>
							
						<div>
						
					</div>
	        	</div>
        	</form>
        </div>
    </div>
</div>
<?php
	
	if(isset($_POST['btnsave'])){
		$user = strtolower($_POST['user']);
		$pass = strtolower($_POST['pass']);
		$usertype = strtolower($_POST['usertype']);
		
		$sql = "INSERT INTO tbl_user(user_name, user_pass, user_type) VALUES('".$user."', '".$pass."','". $usertype."')";
		$db->query($sql);
		header('Location: user.php?page=user');
	}
?> 


<?php include('includes/footer.php'); ?>