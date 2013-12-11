<?php 
	$title='Sale Detail';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php');  
    $id = $_GET['id'];
    $sql = "SELECT sa.*, cu.family_name as family_name, cu.given_name as given_name, pr.product_name as product_name, mo.model_name as model_name, (sa.sale_quantity * sa.sale_price ) as total_amount, us.user_name as user_name,
                (CASE WHEN sa.payment_date IS NOT NULL THEN 'Paid' ELSE 'Not Paid' END) as pay_status
                FROM tbl_sale sa
                LEFT JOIN tbl_customer cu ON (cu.customer_id=sa.customer_id)
                LEFT JOIN tbl_product pr ON (pr.product_id=sa.product_id)
                LEFT JOIN tbl_model mo ON (mo.model_id=pr.model_id)
                LEFT JOIN tbl_user us ON (us.user_id=sa.checked_by)
                WHERE sale_id={$id}";
    $res = $db->query($sql);
    $sale = $res->fetch_array(MYSQLI_ASSOC);
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
<div class="main-content" style="min-height:850px !important;">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-dashboard"></i>
                <a href="/">Dashboard</a>
        
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li><a href="sale.php?page=sale">Sale</a><span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span></li>
            <li class="active">Sale Detail</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Sale Detail </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        <table class="tbldetail">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td><?php echo $sale['sale_id'] ?></td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td><a href="detailcustomer.php?page=detailcustomer&id=<?php echo $sale["customer_id"] ?>"><?php echo ucwords($sale['family_name'].' '.$sale['given_name']) ?></a></td>
                </tr>
                <tr>
                    <th>Prodcut Name</th>
                    <td><?php echo ucwords($sale['product_name']) ?></td>
                </tr>
                <tr>
                    <th>Model Name</th>
                    <td><?php echo ucwords($sale['model_name']) ?></td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td><?php echo $sale['sale_quantity'] ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>
                        $ <?php echo $sale['sale_price'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>
                        $ <?php echo $sale['total_amount'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Sale Date</th>
                    <td>
                        <?php echo date('d-M-Y', strtotime($sale['sale_date'])) ?>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <?php echo ucwords($sale['pay_status']) ?>
                    </td>
                </tr>
                <?php if($sale['payment_date'] != NULL) {?>
                <tr>
                    <th>Paid Amount</th>
                    <td>
                       $ <?php echo $sale['total_amount'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Payment Date</th>
                    <td>
                        <?php echo date('d-M-Y', strtotime($sale['payment_date'])) ?>
                    </td>
                </tr>
                <tr>
                    <th>Checked by</th>
                    <td>
                        <?php echo ucwords($sale['user_name']) ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if($sale['payment_date'] == NULL) {?>
        <div class="span12" style="margin-left:0">
            
            <div class="span6">
                <form action="" method="post"  data-validate="parsley" role="form" id="form">
                <div class="widget-box" style="margin-top: 30px;">
                        <div class="widget-header">
                            <h4>Form Payment</h4>

                            <span class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                    <i class="icon-chevron-up"></i>
                                </a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row-fluid">
                                    <label for="form-field-8">Payment Date</label>
                                <input type="hidden" name="id" value="<?php echo $sale['sale_id'] ?>">
                                <div class="controls">
                                    <input type="text" class="span10 required" name="payment_date" id="payment_date" placeholder="enter payment date" data-validation-minlength="1" data-americandate="true" data-required="true" data-trigger="change" style="margin-bottom: 0;">
                                <button type="submit" class="btn btn-primary btn-small" id="btnpay" name="btnpay"><i class="icon-usd mr"></i>Pay</button>
                                </div>
                                <script>
                                $('#payment_date').datepicker({
                                    format: 'yyyy-mm-dd',
                                });
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="clear"></div>
            <?php } ?>
         </div>
         <div  style="margin-top:10px;">
            <a class="btn btn-danger btn-mini" href="sale.php?page=sale"><i class="icon-reply mr"></i>Back to list</a>
        </div>
        </div>
    </div>
</div>
<?php
    
    if(isset($_POST['btnpay'])){
        $id = $_POST['id'];
        $payment_date = $_POST['payment_date'];
        $checked_by = $_SESSION['id'];

        $sql = "UPDATE tbl_sale SET payment_date = '".$payment_date."', checked_by = '".$checked_by."' WHERE sale_id = '".$id."'";
        $db->query($sql);
        header('Location: detailsale.php?page=detailsale&id='."{$id}");
    }
?> 

<?php include('includes/footer.php'); ?>