<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Dashboard</h1>
	<p class="fw-light">Welcome <?php echo $firstname; ?>!</p>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group me-2">
			<a class="btn btn-sm btn-outline-secondary" href="#subscribers-title">Subscribers</a>
			<a class="btn btn-sm btn-outline-secondary" href="#orders-title">Orders</a>
		</div>
		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
			This week
		</button>
	</div>
</div>

<!-- Orders -->
<h2 id="orders-title">Current Orders</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th scope="col">S.N.</th>
				<th scope="col">Food</th>
				<th scope="col">Number</th>
				<th scope="col">Customer</th>
				<th scope="col">Ordered Time</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1,001</td>
				<td>random</td>
				<td>data</td>
				<td>placeholder</td>
				<td>text</td>
			</tr>
			<tr>
				<td>1,002</td>
				<td>placeholder</td>
				<td>irrelevant</td>
				<td>visual</td>
				<td>layout</td>
			</tr>
			<tr>
				<td>1,003</td>
				<td>data</td>
				<td>rich</td>
				<td>dashboard</td>
				<td>tabular</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- End of Orders -->

<!-- Menu Album -->
<div class="album py-5 bg-light">
	<div class="container">
		<h2>Menu</h2>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
			<?php
				$query = query("SELECT * FROM menu WHERE user_id='{$_SESSION['user']}'");
				confirm($query);

				while($menu = mysqli_fetch_array($query)){
					?>
					<div class="col">
					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/menu/<?php echo $menu['id'] . '_0.jpg';?>">
						<div class="card-body">
							<h3><?php echo $menu['name'];?></h3>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
								</div>
								<small class="text-muted">Rs. <?php echo $menu['price'];?></small>
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

<!-- Subscriber info -->
<h2 id="subscribers-title">Subscribers Details</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th scope="col">S.N.</th>
				<th scope="col">Name</th>
				<th scope="col">Address</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Expiry Date</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1,001</td>
				<td>random</td>
				<td>data</td>
				<td>placeholder</td>
				<td>text</td>
			</tr>
			<tr>
				<td>1,002</td>
				<td>placeholder</td>
				<td>irrelevant</td>
				<td>visual</td>
				<td>layout</td>
			</tr>
			<tr>
				<td>1,003</td>
				<td>data</td>
				<td>rich</td>
				<td>dashboard</td>
				<td>tabular</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- End of Subscriber info -->