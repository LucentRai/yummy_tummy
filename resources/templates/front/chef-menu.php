<h1 class="h2">Your Menu Items</h1>
<?php
	if(!isset($_GET['menu-add'])){
		
	$query = query("SELECT * FROM menu WHERE user_id='{$_SESSION['user']}'");
	confirm($query);
?>
<div class="btn-toolbar mb-2 mb-md-0">
	<div class="btn-group me-2">
		<a href="chef.php?nav=menu&menu-add" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-plus"></i> Add Food Item</a>
	</div>
</div>
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
<?php
	}
	else {
?>
<form class="row g-3" method="post" action="../resources/templates/back/add-menu.php" enctype="multipart/form-data">
	<div class="col-sm-7">
		<label for="name" class="form-label">Name</label>
		<input type="text" class="form-control" id="name" name="name" required>
	</div>
	<div class="col-sm">
		<label for="price" class="form-label">Price</label>
		<input type="number" class="form-control" id="price" name="price" required>
	</div>
	<div class="col-12">
		<label for="ingredient" class="form-label">Ingredients</label>
		<input type="text" class="form-control" id="ingredient" placeholder="Comma seperated ingredients" name="ingredients" required>
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea class="form-control" id="description" rows="3" placeholder="Brief description about this food" name="description" required></textarea>
	</div>
	<div class="input-group mb-3">
		<input type="file" name="file[]" multiple required class="form-control" id="food-img">
	</div>

	<div class="col-12">
		<input type="submit" class="btn btn-primary" value="Add Menu">
	</div>
</form>
<?php
	}
?>