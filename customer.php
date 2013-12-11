<?php 
	$title='Customer List';
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
            <li class="active">Customer</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Customer List </h1>
           	</div>
            <div class="pull-right">
            	<a href="newcustomer.php?page=newcustomer" class="btn btn-primary btn-mini"><i class="icon-plus mr"></i>New Customer</a>
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
        <table id="sample-table-1" class="table" >
            <thead>
            <tr style="border-top:none !important">
                <th style="width:10%">ID</th>
                <th>Family Name</th>
                <th>Given Name</th>
                <th>Phone Number</th>
                <th>Current Address</th>
                <th style="text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST['btnsearch'])){
                    $txtsearch = trim($_POST['txtsearch']);
                    $sql = "SELECT cu.*,(CASE WHEN sa.sale_date IS NOT NULL THEN 'Bought' ELSE 'Free' END) as cus_status
                            FROM tbl_customer cu
                            LEFT JOIN tbl_sale sa on (sa.customer_id = cu.customer_id) WHERE CONCAT_WS(' OR ', cu.customer_id, cu.family_name, cu.given_name, cu.phone_number, cu.current_address) LIKE '%". $txtsearch ."%' GROUP BY customer_id ORDER BY customer_id";
                }elseif(isset($_POST['viewall']) || !isset($_POST['txtsearch'])){
                    $sql = "SELECT cu.*,(CASE WHEN sa.sale_date IS NOT NULL THEN 'Bought' ELSE 'Free' END) as cus_status
                            FROM tbl_customer cu
                            LEFT JOIN tbl_sale sa on (sa.customer_id = cu.customer_id) GROUP BY customer_id ORDER BY customer_id";
                }
                $result = $db->query($sql);
               while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                        echo '<td>'.$rows['customer_id'].'</td>';   
                        echo '<td>'.ucwords($rows['family_name']).'</td>';
                        echo '<td>'.ucwords($rows['given_name']).'</td>' ;
                        echo '<td>'.$rows['phone_number'].'</td>' ;
                        echo '<td>'.ucwords($rows['current_address']).'</td>' ;
                ?>           <td> <ul class="nav ace-nav action-nav">
                            <li class="light-blue" style="background:#fff !important">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle action-a" style="padding:0 !important">
                                <i class="icon-gear" style="color:#428BCA !important"></i>
                            </a> 
                            <div class="clear"></div>
                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                                <li>
                                    <a href="detailcustomer.php?page=detailcustomer&id=<?php echo $rows["customer_id"] ?>" class="info">
                                        <i class="icon-list"></i>
                                        Detail
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="editcustomer.php?page=editcustomer&id=<?php echo $rows["customer_id"] ?>" class="success">
                                        <i class="icon-edit"></i>
                                        Edit
                                    </a>
                                </li>
                                <?php if($rows['cus_status']== 'Free'){ ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="?id=<?php echo $rows["customer_id"] ?>" class="danger" onclick="return confirm('Are you sure to want to delete?')">
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
        $sql = "DELETE FROM tbl_customer WHERE customer_id=".$id;
        $db->query($sql);
        header("Location: customer.php?page=customer"); 
    }
?>

<?php include('includes/footer.php'); ?>