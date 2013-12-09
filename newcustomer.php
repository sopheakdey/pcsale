<?php 
	$title='New Customer';
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
					<?php if($_SESSION['type'] == 'admin'){ ?>
                    <li>
						<a href="user.php?page=user">
							<i class="icon-user"></i>
							<span class="menu-text"> User </span>
						</a>
					</li>
					<?php } ?>
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
            <li><a href="customer.php?page=customer">Customer</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">New Customer</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> New Customer </h1>
            	<p class="header-help">Please enter all customer infomation</p>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        	<form action="" method="post"  data-validate="parsley" role="form" id="form">
	        	<div class="span12">
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="fname">Family Name<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="fname" name="fname" placeholder="enter family name" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter family name">
								<p class="input-help">example: <u>Chan </u>Ratana.</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="gname">Given Name <span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="gname" name="gname" placeholder="enter given name" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter given name">
								<p class="input-help">example: Chan <u>Ratana.</u></p>
							</div>
						</div>
						
	        		</div>
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="pnumber">Phone Number<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="pnumber" name="pnumber" placeholder="enter phone number" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter phone number">
								<p class="input-help">example: 012500600</p>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="caddress">Current Address<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="caddress" name="caddress" placeholder="enter current address" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter current address">
								<p class="input-help">example: siem reap</p>
							</div>
						</div>
	        		</div>
	        	</div>
	        	<div class="clear"></div>
	        	<div>
	        		<div class="span6">
			        	<div class="control-group">
							<a class="btn btn-danger btn-mini" href="customer.php?page=customer"><i class="icon-reply mr"></i>Back to list</a>
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
		$fname = strtolower($_POST['fname']);
		$gname = strtolower($_POST['gname']);
		$pnumber = strtolower($_POST['pnumber']);
		$caddress = strtolower($_POST['caddress']);
		
		$sql = "INSERT INTO tbl_customer(family_name, given_name, phone_number, current_address) VALUES('".$fname."', '".$gname."','". $pnumber."','".$caddress."')";
		$db->query($sql);
		header('Location: customer.php?page=customer');
	}
?> 


<?php include('includes/footer.php'); ?>