<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Current Orders</h1>
</div>

<!-- Orders -->
<?php
	if(isset($_POST['remove-order'])){
		$orders_query = query("DELETE FROM orders WHERE orders_id='{$_POST['remove-order']}'");
		confirm($orders_query);
	}
	$orders_query = query("SELECT * FROM orders INNER JOIN users ON orders.user_id = users.id AND orders.chef_id='{$_SESSION['user']}'");
	confirm($orders_query);
?>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th scope="col">Food</th>
				<th scope="col">Number</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Address</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while($orders = mysqli_fetch_array($orders_query)){
					$menu_name_query = query("SELECT name FROM menu WHERE id='{$orders['menu_id']}';");
					confirm($menu_name_query);
					$menu_name = mysqli_fetch_array($menu_name_query);
				?>
			<tr>
				<td scope="col"><?php echo $menu_name['name'];?></td>
				<td scope="col"><?php echo $orders['number'];?></td>
				<td scope="col"><?php echo $orders['firstname'] . ' ' . $orders['lastname'];?></td>
				<td scope="col"><?php echo $orders['address'];?></td>
				<td scope="col"><form action="chef.php?nav=orders" method="post"><button type="submit" class="btn primary-btn" name="remove-order" value="<?php echo $orders['orders_id']; ?>"><i class="fa-solid fa-trash"></i></button></form></td>
			</tr>
			<?php
				}
				?>
		</tbody>
	</table>
</div>
<!-- End of Orders -->