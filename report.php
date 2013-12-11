<?php 
	$title='Report List';
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
            <li class="active">Report</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<div class="page-header position-relative">
        	<div class="pull-left">
            	<h1> Under our construction </h1>
           	</div>
            <div class="clear"></div>
        </div>
        
    </div>
</div>

<?php }else echo 'No permission' ;include('includes/footer.php'); ?>