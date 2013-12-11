<?php 
	$title='Product List';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php');
	include('includes/menu.php'); 
?>

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
            <li class="active">Product</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Product List </h1>
           	</div>
            <div class="pull-right">
            	<a href="newproduct.php?page=newproduct" class="btn btn-primary btn-mini"><i class="icon-plus mr"></i>New Product</a>
           	</div>
            <div class="clear"></div>
            <div class="row-fluid">
                <div class="span6" style="float:right">
                    <div class="dataTables_filter" id="sample-table-2_filter" style="margin-right:0 !important">
                        <form action="" method="post">
                            <input type="text" name="txtsearch" placeholder="Search" style="margin-bottom:0" value="<?php if(isset($_POST['btnsearch'])) echo $_POST['txtsearch'] ?>">
                            <button class="btn btn-light btn-small" name="btnsearch" type="submit" >Search</button>
                            <button class="btn btn-light btn-small" name="viewall" type="submit" >View all</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
        <table id="sample-table-1" class="table">
            <thead>
            <tr style="border-top:none !important">
                <th style="width:10%">ID</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Model Name</th>
                <th style="text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST['btnsearch'])){
                    $txtsearch = trim($_POST['txtsearch']);
                    $sql = "SELECT p.*,m.model_name,sa.sale_date as sale_date,
                    (p.quantity - SUM(sa.sale_quantity)) as remain_product_quantity
                    FROM tbl_product p 
                    LEFT JOIN tbl_model m ON m.model_id = p.model_id 
                    LEFT JOIN tbl_sale sa on sa.product_id = p.product_id  WHERE CONCAT_WS(' OR ', p.product_id, p.product_name, p.quantity, p.price, m.model_name) LIKE '%". $txtsearch ."%' GROUP BY p.product_id ORDER BY p.product_id";
                }elseif(isset($_POST['viewall']) || !isset($_POST['txtsearch'])){
                    $sql = "SELECT p.*,m.model_name,sa.sale_date as sale_date,
                    (p.quantity - SUM(sa.sale_quantity)) as remain_product_quantity
                    FROM tbl_product p 
                    LEFT JOIN tbl_model m ON m.model_id = p.model_id 
                    LEFT JOIN tbl_sale sa on sa.product_id = p.product_id GROUP BY p.product_id ORDER BY p.product_id";
                }
                $result = $db->query($sql);
               while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                        echo '<td>'.$rows['product_id'].'</td>';   
                        echo '<td>'.ucwords($rows['product_name']).'</td>';
                        echo '<td>'.ucwords($rows['quantity']).'</td>' ;
                        echo '<td>$ '.$rows['price'].'</td>' ;
                        echo '<td>'.ucwords($rows['model_name']).'</td>' ;
                ?>           <td> <ul class="nav ace-nav action-nav">
                            <li class="light-blue" style="background:#fff !important">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle action-a" style="padding:0 !important">
                                <i class="icon-gear" style="color:#428BCA !important"></i>
                            </a> 
                            <div class="clear"></div>
                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                               <?php if($rows['remain_product_quantity']!=0 || $rows['remain_product_quantity'] == NULL){ ?>
                               <li>
                                    <a href="newsale.php?page=newsale&id=<?php echo $rows["product_id"] ?>" class="warning">
                                        <i class="icon-usd"></i>
                                        Start sale
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <?php } ?>
                                <li>
                                    <a href="detailproduct.php?page=detailproduct&id=<?php echo $rows["product_id"] ?>" class="info">
                                        <i class="icon-list"></i>
                                        Detail
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="editproduct.php?page=editproduct&id=<?php echo $rows["product_id"] ?>" class="success">
                                        <i class="icon-edit"></i>
                                        Edit
                                    </a>
                                </li>
                                <?php if($rows['remain_product_quantity'] == NULL){ ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="?id=<?php echo $rows["product_id"] ?>" class="danger" onclick="return confirm('Are you sure to want to delete?')">
                                        <i class="icon-remove-sign"></i>
                                        Delete
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        
                    </li></ul></td> 
                    </tr>
                <?php    
                }
                ?>
            
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php 
    $id = @$_GET['id'];
    if(isset($id)){
        $sql = "DELETE FROM tbl_product WHERE product_id=".$id;
        $db->query($sql);
        header("Location: product.php?page=product"); 
    }
?>

<?php include('includes/footer.php'); ?>