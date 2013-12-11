<?php 
	$title='User List';
	include('includes/database.php');
	include('includes/session.php'); 
	include('includes/header.php'); 
	include('includes/menu.php'); 
	if($_SESSION['type'] == 'admin'){
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
            <li class="active">User</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> User List </h1>
           	</div>
            <div class="pull-right">
            	<a href="newuser.php?page=newuser" class="btn btn-primary btn-mini"><i class="icon-plus mr"></i>New User</a>
           	</div>
            <div class="clear"></div>
        </div>
        <div class="row-fluid">
        <table id="sample-table-1" class="table">
        	<thead>
            <tr style="border-top:none !important">
                <th style="width:25%">ID</th>
                <th>User Name</th>
                <th>User Type</th>
                <th style="text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM tbl_user";
				$result = $db->query($sql);
               while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                        echo '<td>'.$rows['user_id'].'</td>';	
                        echo '<td>'.$rows['user_name'].'</td>';
                        echo '<td>'.$rows['user_type'].'</td>' ;
				?>			 <td> <ul class="nav ace-nav action-nav">
							<li class="light-blue" style="background:#fff !important">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle action-a" style="padding:0 !important">
								<i class="icon-gear" style="color:#428BCA !important"></i>
							</a> 
							<div class="clear"></div>
							<?php if($rows['user_id'] != 1){
							?> 
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="edituser.php?page=edituser&id=<?php echo $rows["user_id"] ?>" class="success">
										<i class="icon-edit"></i>
										Edit
									</a>
								</li>
								
                                <?php if($_SESSION['user'] != $rows['user_name']){ ?>
								<li class="divider"></li>
								<li>
									<a href="?id=<?php echo $rows["user_id"] ?>" class="danger" onclick="return confirm('Are you sure to want to delete?')">
										<i class="icon-remove-sign"></i>
										Delete
									</a>
								</li>
								<?php }?>
							</ul>
							<?php }?>
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
		$sql = "DELETE FROM tbl_user WHERE user_id=".$id;
		$db->query($sql);
		header("Location: user.php?page=user"); 
	}
?>

<?php }else echo 'No permission' ;include('includes/footer.php'); ?>