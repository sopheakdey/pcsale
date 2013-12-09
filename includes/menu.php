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
					<li class="<?php if (empty($_GET["page"])) echo "active"; ?>">
						<a href="./">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
					<li class="<?php if  (isset($_GET["page"]) and ($_GET["page"]=="product")) echo "active"; ?>">
						<a href="product.php?page=product">
							<i class="icon-th-large"></i>
							<span class="menu-text"> Product </span>
                        </a> 
					</li>
					<li class="<?php if  (isset($_GET["page"]) and ($_GET["page"]=="customer")) echo "active"; ?>">
						<a href="customer.php?page=customer">
							<i class="icon-user-md"></i>
							<span class="menu-text"> Customer </span>
						</a>
					</li>
                    <li class="<?php if  (isset($_GET["page"]) and ($_GET["page"]=="sale")) echo "active"; ?>">
						<a href="sale.php?page=sale">
							<i class="icon-shopping-cart"></i>
							<span class="menu-text"> Sale </span>
                        </a> 
					</li>
					<li class="<?php if  (isset($_GET["page"]) and ($_GET["page"]=="report")) echo "active"; ?>">
						<a href="report.php?page=report">
							<i class="icon-file-text"></i>
							<span class="menu-text"> Report </span>
						</a>
					</li>
					<?php if($_SESSION['type'] == 'admin'){ ?>
                    <li class="<?php if  (isset($_GET["page"]) and ($_GET["page"]=="user")) echo "active"; ?>">
						<a href="user.php?page=user">
							<i class="icon-user"></i>
							<span class="menu-text"> User </span>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>