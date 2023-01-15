<?php
	require_once("../resources/config.php");
	if(!$is_logged_in){
		redirect("login.php");
	}

	get_user_info();

	$menu_query = query("SELECT * FROM menu");
	confirm($menu_query);
	$subscription_query = query("SELECT * FROM subscription INNER JOIN users ON subscription.chef_id = users.id;");
	confirm($subscription_query);

	require('../resources/templates/front/header.php');
?>
	<title>View Menu</title>
	<link href="./css/customer.css" rel="stylesheet">
</head>
<body>
	<!-- nav-bar -->
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
						  <a class="dropdown-item" href="../resources/templates/back/logout.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
						</li>
					  </ul>
					</li>
				  </ul>
			</div>
		</header>
	</div>
	<!-- End of nav-bar -->

	<main class="container my-4">
		<?php
		if(!isset($_GET['action'])){
		?>

		<!-- Subscription info -->
		<h2 id="subscribers-title">Subscription Details</h2>
		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th scope="col">S.N.</th>
						<th scope="col">Name</th>
						<th scope="col">Cook</th>
						<th scope="col">Price</th>
						<th scope="col">Expiry Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 1; $subscription_info = mysqli_fetch_array($subscription_query); $i++){
						$food_query = query("SELECT name FROM menu WHERE id='{$subscription_info['menu_id']}'");
						confirm($food_query);
						$subscribed_food = mysqli_fetch_array($food_query);
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $subscribed_food['name'];?></td>
						<td><?php echo $subscription_info['firstname'] . ' ' . $subscription_info['lastname']; ?></td>
						<td><?php echo $subscription_info['price'];?></td>
						<td><?php echo '2023 February 14';?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<!-- End of Subscriber info -->
		<h1>Avilable Foods</h1>
		<!-- Menu Album -->
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					<?php
						while($menu = mysqli_fetch_array($menu_query)){
							?>
							<div class="col">
							<div class="card shadow-sm">
								<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/menu/<?php echo $menu['id'] . '_0.jpg';?>">
								<div class="card-body">
									<h3><?php echo $menu['name'];?></h3>
									<p class="card-text"><?php echo $menu['description'];?></p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<a href="customer.php?action=subscribe&menu_id=<?php echo $menu['id'];?>" class="btn btn-primary">Subscribe</a>
											<a href="customer.php?action=order&menu_id=<?php echo $menu['id'];?>" class="btn btn-success">Order</a>
										</div>
										<!-- <input type="number" name="num" placeholder="1" value="1" style="width:3rem"> -->
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
		<?php
		}
		else {
			$menu_query = query("SELECT * FROM menu WHERE id='{$_GET['menu_id']}';");
			confirm($menu_query);
			$menu = mysqli_fetch_array($menu_query);
			$chef_id = $menu['user_id'];
			switch($_GET['action']){
				case 'subscribe':
				case 'order':
					include_once('../resources/templates/front/customer-action-success.php');
					break;
				default:
					redirect('customer.php');
					break;
			}
		}
		?>
	</main>

<?php
	require('../resources/templates/front/footer.php');
?>