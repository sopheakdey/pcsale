<?php 
	$title='New Product';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php'); 

	$sql = "SELECT * FROM tbl_model";
	$res = $db->query($sql);
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
                <i class="icon-dashboard"></i>
                <a href="/">Dashboard</a>
        
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li><a href="product.php?page=product">Product</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">New Product</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> New Product </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        	
	        	<div class="span12">
	        		<form action="" method="post"  data-validate="parsley" role="form" id="form">
	        		<div class="span6"> 
						<div class="control-group">
							<label class="control-label" for="pname">Product Name<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="pname" name="pname" placeholder="enter product name" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter product name">
								
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="qty">Quantity <span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="qty" name="qty" placeholder="enter quantity" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter quantity">
								
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="price">Price <span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="price" name="price" placeholder="enter price" class="span10 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter price">
								
							</div>
						</div>
						<div class="control-group">
				
							<a class="btn btn-danger btn-mini" href="product.php?page=product"><i class="icon-reply mr"></i>Back to list</a>
							<button type="submit" class="btn btn-primary btn-mini" id="btnsave" name="btnsave"><i class="icon-save mr"></i>Save</button>
						</div>
	        		</div>
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="mid">Model Name<span class="require">*</span></label>
							<div class="controls">
								<select name="mid" id="mid" class="span10 required" data-required="true" data-required-message="No model name selection">
									<option value="">No model name selection</option>
									<?php while ($item=$res->fetch_array()) {?>
									<option value="<?php echo $item['model_id'] ?>"><?php echo $item['model_name'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">OR</label>
						</div>
						</form>
						<form action="add_model.php" method="post">
		        			<div class="control-group">
									<label class="control-label" for="mname">Model Name <span class="require">*</span></label>
									<div class="controls">
										<input type="text" id="mname" name="mname" placeholder="enter model name" class="span10">
											
									</div>
							</div>
							<div class="control-group">
								<button type="submit" class="btn btn-primary btn-mini" id="btnadd" name="btnadd"><i class="icon-plus mr"></i>Add</button>
							</div>
		        		</form>
	        		</div>
	        	</div>
	        	
        	</div>
        	
        </div>
        
    </div>
</div>
<?php
	
	if(isset($_POST['btnsave'])){
		$pname = strtolower($_POST['pname']);
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$mid = strtolower($_POST['mid']);
		
		$sql = "INSERT INTO tbl_product(model_id, product_name, quantity, price) VALUES('".$mid."', '".$pname."','". $qty."','".$price."')";
		$db->query($sql);
		header('Location: product.php?page=product');
	}
?> 


<?php include('includes/footer.php'); ?>