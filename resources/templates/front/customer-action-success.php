<?php
	$user = query("SELECT * FROM users WHERE id='{$menu['user_id']}'");
	confirm($user);
	$user = mysqli_fetch_array($user);

	if($_GET['action'] == 'subscribe'){
		$subs_id = uuid();
		$query = query("INSERT INTO subscription (subs_id, user_id, chef_id, duration, menu_id) VALUES ('{$subs_id}', '{$_SESSION['user']}', '{$chef_id}', 1, '{$_GET['menu_id']}');");
		confirm($query);
		$query = query("INSERT INTO subs_notice (user_id, subs_id) VALUES ('{$_SESSION['user']}', '{$subs_id}')");
		confirm($query);
		$h1 = 'Successfully subscribed ' . $menu['name'];
		$h4_price = $menu['price'] * 30 - (SUB_DISCOUNT * $menu['price']);
	}
	else{
		$orders_id = uuid();
		$query = query("INSERT INTO orders (orders_id, user_id, chef_id, menu_id, number) VALUES ('{$orders_id}', '{$_SESSION['user']}', '{$chef_id}', '{$_GET['menu_id']}', 1);");
		confirm($query);
		$query = query("INSERT INTO order_notice (user_id, order_id) VALUES ('{$_SESSION['user']}', '{$orders_id}')");
		confirm($query);
		$h1 = 'Successfully ordered ' . $menu['name'];
		$h4_price = $menu['price'];
	}
	$query = query("UPDATE users SET notifications = notifications + 1 WHERE users.id = '{$menu['user_id']}'");
?>

<h1><?php echo $h1; ?> <i class="fa-solid fa-square-check"></i></h1>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
	<div class="col">
		<div class="card shadow-sm">
			<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/menu/<?php echo $menu['id'] . '_0.jpg';?>">
			<div class="card-body">
				<h4>Cook: <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></h4>
				<p class="card-text"><?php echo $menu['description'];?></p>
				<div class="d-flex justify-content-between align-items-center">
					<h4 class="fs-2">Rs. <?php echo $h4_price; ?></h4>
				</div>
			</div>
		</div>
	</div>
</div>