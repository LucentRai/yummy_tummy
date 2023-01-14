<?php
	require_once("../resources/config.php");

	if(!$is_logged_in){
		redirect("login.php");
	}

	$nav_page = array(
		array("dashboard", ''),
		array("menu", ''),
		array("orders", ''),
		array("profile", ''),
		array("reports", '')
	);

	if(isset($_GET['nav'])){
		switch($_GET['nav']){
			case $nav_page[1][0]:
				$nav_page[1][1] = 'active';
				break;
			case $nav_page[2][0]:
				$nav_page[2][1] = 'active';
				break;
			case $nav_page[3][0]:
				$nav_page[3][1] = 'active';
				break;
			case $nav_page[4][0]:
				$nav_page[4][1] = 'active';
				break;
			default:
				$nav_page[0][1] = 'active';
				break;
		}
	}
	else{
		$nav_page[0][1] = 'active';
	}

	$query = query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
	confirm($query);
	$row = mysqli_fetch_array($query);
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];

	require('../resources/templates/front/header.php');
?>
	<title><?php echo $firstname . $lastname; ?> Dashboard -- Yummy Tummy</title>

	<link href="css/dashboard.css" rel="stylesheet">
	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
</head>
<body>		
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php"><img src="assets/favicon/mstile-70x70.png" alt="Logo" class="logo">Yummy Tummy</a>
	<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<div class="navbar-nav">
		<div class="nav-item text-nowrap">
			<a class="nav-link px-3" href="../resources/templates/back/logout.php">Sign out <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
		</div>
	</div>
</header>

<div class="container-fluid">
	<div class="row">
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link <?php echo $nav_page[0][1];?>" href="chef.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $nav_page[1][1];?>" href="chef.php?nav=<?php echo $nav_page[1][0];?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
							Menu
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $nav_page[2][1];?>" href="chef.php?nav=<?php echo $nav_page[2][0];?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
							Orders
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $nav_page[3][1];?>" href="chef.php?nav=<?php echo $nav_page[3][0];?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
							Profile
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $nav_page[4][1];?>" href="chef.php?nav=<?php echo $nav_page[4][0];?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
							Reports
						</a>
					</li>
				</ul>
				<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
					<span>Saved reports</span>
					<a class="link-secondary" href="#" aria-label="Add a new report">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
					</a>
				</h6>
				<ul class="nav flex-column mb-2">
					<li class="nav-item">
						<a class="nav-link" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
							Current month
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<?php
			if(isset($_GET['nav'])){
				switch($_GET['nav']){
					case $nav_page[1][0]:
						include_once('../resources/templates/front/chef-' . $nav_page[1][0] . '.php');
						break;
					case $nav_page[2][0]:
						include_once('../resources/templates/front/chef-' . $nav_page[2][0] . '.php');
						break;
					case $nav_page[3][0]:
						include_once('../resources/templates/front/chef-' . $nav_page[3][0] . '.php');
						break;
					case $nav_page[4][0]:
						include_once('../resources/templates/front/chef-' . $nav_page[4][0] . '.php');
						break;
					default:
						include_once('../resources/templates/front/chef-' . $nav_page[0][0] . '.php');
						break;
				}
			}
			else{
				include_once('../resources/templates/front/chef-' . $nav_page[0][0] . '.php');
			}
			?>
		</main>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body></html>