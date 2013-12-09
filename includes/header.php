<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Css -->	
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/assets/css/style.css" />
		<link rel="stylesheet" href="/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/assets/css/datepicker.css" />
        <link rel="stylesheet" href="/assets/css/chosen.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
    	<!-- End Css -->

    	<!-- Javascript -->
    	<!--[if !IE]>-->

		<script src="/assets/js/jquery-1.7.2.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<!--<script src="/assets/js/jquery.form.min.js"></script>-->
        <script src="/assets/js/parsley.js"></script>
		<script src="/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/assets/js/jquery.sparkline.min.js"></script>
		<script src="/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="/assets/js/jquery.flot.min.js"></script>
		<script src="/assets/js/jquery.flot.pie.min.js"></script>
		<script src="/assets/js/jquery.flot.resize.min.js"></script>
		<script src="/assets/js/ace-elements.min.js"></script>
		<script src="/assets/js/ace.min.js"></script>
		<script src="/assets/js/chosen.jquery.min.js"></script>
        <script src="/assets/js/script.js"></script>
		<!-- End Javascript -->
    </head>
<body>
	<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="/" class="brand">
						<small>
							PC Sale Management System
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle login-name">
								<?php echo $_SESSION['user']; ?>
								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								

								<li>
									<a href="editpassword.php?page=editpassword&id=<?php echo $_SESSION['id'] ?>">
										<i class="icon-edit"></i>
										Edit password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="icon-signout"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
<!-- END HEADER -->
	<div class="main-container container-fluid">

