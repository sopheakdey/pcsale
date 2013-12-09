<?php 
	$title='New Sale';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php'); 
	//Product
	$id = $_GET['id'];
	$sql1 = "SELECT * FROM tbl_product WHERE product_id={$id}";
	$res1 = $db->query($sql1);
	$product = $res1->fetch_array(MYSQLI_ASSOC);
	//Customer
	$sql2 = "SELECT * FROM tbl_customer";
	$res2 = $db->query($sql2);
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
            <li><a href="sale.php?page=sale">Sale</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">New Sale</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> New Sale </h1>
            	<p class="header-help">Please enter all sale infomation</p>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        	<form action="" method="post"  data-validate="parsley" role="form" id="form">
	        	<div class="span12">
	        		<div class="span6">
						<div class="control-group">
							<label class="control-label" for="pid">Product ID<span class="require">*</span></label>
							<div class="controls">
								<input type="text"  value="<?php echo $product['product_id'] ?>" id="pid" name="pid" placeholder="enter product id" class="span8 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter product id">
							</div>
						</div>
                        <div class="control-group">
							<label class="control-label" for="price">Price<span class="require">*</span></label>
							<div class="controls">
								<input type="text"  value="<?php echo $product['price']?>" id="price" name="price" placeholder="enter price" class="span8 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter price">
							</div>
						</div>
                        <div class="control-group">
							<label class="control-label" for="qty">Quantity<span class="require">*</span></label>
							<div class="controls">
								<input type="text" id="qty" name="qty" placeholder="enter quantity" class="span8 required" data-notblank="true" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter quantity">
							</div>
						</div>
	        		</div>
	        		<div class="span6">
						<div class="control-group">
								<label for="form-field-select-3">Customer Name<span class="require">*</span></label>
								<div class="controls">
								<select class="chzn-select span3" id="form-field-select-3" data-placeholder="No customer selection" name="cid">
									<option value=""></option>
									<?php while ($item=$res2->fetch_array()) {?>
									<option value="<?php echo $item['customer_id'] ?>"><?php echo (ucwords($item['family_name']).' '.ucwords($item['given_name'])) ?></option>
									<?php } ?>
								</select>
							</div>
						<script>
						$(".chzn-select").chosen(); 
						</script>
						</div>
						<div class="control-group">
							<label class="control-label" for="sale_date">Sale Date<span class="require">*</span></label>
							<div class="controls">
								<input type="text" class="span10 required" name="sale_date" id="sale_date" placeholder="enter sale date" data-validation-minlength="1" data-americandate="true" data-required="true" data-trigger="change" data-error-message="Please enter sale date">
							</div>
						<script>
						$('#sale_date').datepicker({
					    	format: 'yyyy-mm-dd',
						});
						</script>
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
		$pid = $_POST['pid'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$cid = $_POST['cid'];
		$sale_date = $_POST['sale_date'];

		$sql = "INSERT INTO tbl_sale(product_id, customer_id, sale_price, sale_quantity, sale_date) VALUES('".$pid."', '".$cid."','". $price."','".$qty."', '".$sale_date."')";
		$db->query($sql);
		header('Location: sale.php?page=sale');
	}
?> 


<?php include('includes/footer.php'); ?>