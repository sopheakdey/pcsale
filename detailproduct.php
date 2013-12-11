<?php 
	$title='Product Detail';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php');  
    $id = $_GET['id'];
    $sql = "SELECT p.*,m.model_name,
            SUM(sa.sale_quantity) as total_sale_amount,
            (p.quantity - SUM(sa.sale_quantity)) as remain_product_quantity,
            (CASE WHEN (p.quantity - SUM(sa.sale_quantity)) = 0 THEN 'Not Available' ELSE 'Available' END) as pro_status
            FROM tbl_product p 
            LEFT JOIN tbl_model m ON m.model_id = p.model_id 
            LEFT JOIN tbl_sale sa on sa.product_id = p.product_id WHERE p.product_id={$id}";
    $res = $db->query($sql);
    $product = $res->fetch_array(MYSQLI_ASSOC);
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
            <li class="active">Product Detail</li>
        </ul>
    </div>
    
    <div class="page-content" style="margin-bottom:0 !important">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Product Detail </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        <table class="tbldetail">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td><?php echo $product['product_id'] ?></td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td><?php echo ucwords($product['product_name']) ?></td>
                </tr>
                <tr>
                    <th>Total Product Quantity</th>
                    <td><?php echo ucwords($product['quantity']) ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>$ <?php echo $product['price'] ?></td>
                </tr>
                <tr>
                    <th>Model Name</th>
                    <td>
                        <?php echo ucwords($product['model_name']) ?>
                    </td>
                </tr>
                <tr>
                    <th>Total Sale Amount</th>
                    <?php if($product['total_sale_amount']){ ?>
                    <td>
                        <?php echo ucwords($product['total_sale_amount']) ?>
                    </td>
                    <?php }ELSE{ ?>
                    <td>0</td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Remain Product Quantity</th>
                    <?php if($product['remain_product_quantity'] != NULL) {?>
                    <td>
                        <?php echo ucwords($product['remain_product_quantity']) ?>
                    </td>
                    <?php }ELSE{?>
                    <td>
                        <?php echo $product['quantity']; ?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <?php echo $product['pro_status'] ?>
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        </div>
    </div>
    <div class="page-content" style="margin-top:0 !important">
        <div class="page-header position-relative">
            <div class="pull-left">
                <h1> Sale List of This Product </h1>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        <table id="sample-table-1" class="table">
            <thead>
            <tr style="border-top:none !important">
                <th>Sale ID</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th>Sale Date</th>
                <th>Status</th>
                <th style="text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT sa.*, cu.family_name, cu.given_name, pr.product_id, (sa.sale_quantity * sa.sale_price ) as total_amount,
                (CASE WHEN sa.payment_date IS NOT NULL  THEN 'Paid' ELSE 'Not Paid' END) as pay_status
                FROM tbl_sale sa
                LEFT JOIN tbl_customer cu ON (cu.customer_id=sa.customer_id)
                LEFT JOIN tbl_product pr ON (pr.product_id=sa.product_id) WHERE pr.product_id={$id} ORDER BY sa.sale_id";
                $res = $db->query($sql);
               while ($rows = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                        echo '<td>'.$rows['sale_id'].'</td>';   
                        echo '<td>'.ucwords($rows['family_name'].' '.$rows['given_name']) .'</td>';
                        echo '<td>'.ucwords($rows['sale_quantity']).'</td>' ;
                        echo '<td>$ '.$rows['sale_price'].'</td>' ;
                        echo '<td>$ '.$rows['total_amount'].'</td>' ;
                        echo '<td>'.date('d-M-Y', strtotime($rows['sale_date'])).'</td>' ;
                        echo '<td>'.ucwords($rows['pay_status']).'</td>' ;
                ?>           <td style="text-align:right"> 
                                 <a href="detailsale.php?page=detailsale&id=<?php echo $rows["sale_id"] ?>" class="btn btn-mini btn-pink"><i class="icon-usd mr"></i>Detail</a>
                            </td> 
                    </tr>
                <?php    
                }
                ?>
            
            </tbody>
        </table>
        <a class="btn btn-danger btn-mini" href="product.php?page=product"><i class="icon-reply mr"></i>Back to list</a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>