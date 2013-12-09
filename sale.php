<?php 
	$title='Sale List';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php'); 
	include('includes/menu.php'); 
?>

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
            <li class="active">Sale</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Sale List </h1>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        <table id="sample-table-1" class="table">
        	<thead>
            <tr style="border-top:none !important">
                <th style="width:7%">ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
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
                $sql = "SELECT sa.*, cu.family_name as family_name, cu.given_name as given_name, pr.product_name as product_name, mo.model_name as model_name, (sa.sale_quantity * sa.sale_price ) as total_amount,
                (CASE WHEN sa.payment_date IS NOT NULL  THEN 'Paid' ELSE 'Not Paid' END) as pay_status
                FROM tbl_sale sa
                LEFT JOIN tbl_customer cu ON (cu.customer_id=sa.customer_id)
                LEFT JOIN tbl_product pr ON (pr.product_id=sa.product_id)
                LEFT JOIN tbl_model mo ON (mo.model_id=pr.model_id) ORDER BY sa.sale_id";
                $res = $db->query($sql);
               while ($rows = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                        echo '<td>'.$rows['sale_id'].'</td>';   
                        echo '<td>'.ucwords($rows['family_name']).' '.ucwords($rows['given_name']).'</td>';
                        echo '<td>'.ucwords($rows['product_name']).'</td>';
						echo '<td>'.ucwords($rows['sale_quantity']).'</td>' ;
                        echo '<td>$ '.$rows['sale_price'].'</td>' ;
						echo '<td>$ '.$rows['total_amount'].'</td>' ;
                        echo '<td>'.date('d-M-Y', strtotime($rows['sale_date'])).'</td>' ;
                        echo '<td>'.ucwords($rows['pay_status']).'</td>' ;
                ?>           <td style="text-align:right"> 
                                 <a href="detailsale.php?page=detailsale&id=<?php echo $rows["sale_id"] ?>" class="btn btn-mini btn-pink"><i class="icon-list mr"></i>Detail</a>
                            </td> 
                    </tr>
                <?php    
                }
                ?>
            
            </tbody>
		</table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>