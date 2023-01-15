<?php
	require_once("../resources/config.php");
	if(!$is_logged_in){
		redirect("login.php");
	}

	get_user_info();

	$query = query("SELECT * FROM menu");
	confirm($query);

	require('../resources/templates/front/header.php');
?>
	<title>Customer's View</title>
	<link href="./css/customer.css" rel="stylesheet">
</head>
<body>
	<!-- nav-bar  -->
	<div class="container">
		<header class="d-flex flex-wrap align-items-center justify-content-around justify-content-md-between py-3  border-bottom">
			<a href="index.php" class="d-flex align-items-left ">
				<img src="./assets/img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="25"
					height="25" loading="lazy">
			</a>

			<div class="col-md-3 text-end">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						<i class="bi bi-person-fill"></i><?php echo $_SESSION['firstname']; ?>
					  </a>
					  <ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
						<hr>
						<li>
						  <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Log Out</a>
						</li>
					  </ul>
					</li>
				  </ul>
			</div>
		</header>
	</div>

	<!-- search -->
	<div class="container my-4">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <h1>Avilable Foods</h1>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>

		<!-- Menu Album -->
		<div class="album py-5 bg-light">
			<div class="container">
				<h2>Menu</h2>
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					<?php
						while($menu = mysqli_fetch_array($query)){
							?>
							<div class="col">
							<div class="card shadow-sm">
								<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/menu/<?php echo $menu['id'] . '_0.jpg';?>">
								<div class="card-body">
									<h3><?php echo $menu['name'];?></h3>
									<p class="card-text"><?php echo $menu['description'];?></p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-outline-secondary">Subscribe</button>
											<button type="button" class="btn btn-sm btn-outline-secondary">Order</button>
										</div>
										<h4 class="fs-2">Rs. <?php echo $menu['price'];?></h4>
									</div>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<!-- End of Menu Album -->
	</div>

	<!-- footer -->
	<div class="container">
		<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
			<div class="col mb-3 my-5">
				<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
					<img src="./assets/img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="50" height="50" loading="lazy">
				</a>
				<p class="text-muted my-4">Yummy Tummy</p>
			</div>
			
			<div class="col mb-3">
				<h5>Kathmandu</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Newroad</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Koteshor</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bouddha</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kalanki</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thapathali</a></li>
				</ul>
			</div>

			<div class="col mb-3">
				<h5>Bhaktapur</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sipadol</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thimi</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bhatgaon</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Katunje</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Madhyapur</a></li>
				</ul>
			</div>

			<div class="col mb-3">
				<h5>Lalitpur</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Satdobato</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkhu</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkumari</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Patan</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lagankhel</a></li>
				</ul>
			</div>
		</footer>
	</div>

<?php
	require('../resources/templates/front/header.php');
?>