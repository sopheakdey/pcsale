<?php 
	$title='Home';
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
            <li class="active">Dashboard</li>
        </ul>
    </div>
    
    <div class="page-content">
    	<h1>Welcome to home page</h1>
    </div>
</div>

<?php include('includes/footer.php'); ?>