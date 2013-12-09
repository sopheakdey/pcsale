<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Css -->	
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="/assets/css/ace-skins.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <style>
	    	.parsley-error-list {
				color: #B94A48;
				font-size: 11px;
				list-style: none;
				padding: 0;
				margin: 0;
			}
			body{
				font-family:"Helvetica Neue",Helvetica,Arial,sans-serif !important;
			}
	    </style>
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
        <script src="/assets/js/parsley.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="/assets/js/ace-elements.min.js"></script>
		<script src="/assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
		<!-- End Javascript -->
    </head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-lock green"></i>
										<span class="red">System</span>
										<span class="white">Login</span>
									</h1>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
                                        <form action="/do_login.php" method="post" style="margin:0" data-validate="parsley" role="form" id="form" >											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Please Enter Your Information
												</h4>

												<div class="space-6"></div>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12 required" autofocus placeholder="Username" name="username"  data-notblank="true" placeholder="Enter user" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter user" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12 required" placeholder="Password" data-notblank="true" placeholder="Enter user" data-required="true" data-trigger="keyup focusin focusout change" data-required-message="Please enter password"/>
																<i class="icon-key"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<label class="inline">
																<input type="checkbox" name="remember"/>
																<span class="lbl"> Remember Me</span>
															</label>

															<button type="submit" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-signin"></i>
																Login
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>

												
											</div>

											
										</div>
                                        </form>

									</div>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
