<!-- Orders -->
<?php
	$orders_query = query("SELECT * FROM order_notice INNER JOIN orders ON orders.orders_id = order_notice.order_id AND order_notice.user_id='{$_SESSION['user']}'");
	confirm($orders_query);
?>
<h2 id="orders-title">New Orders</h2>
<?php
	$num = mysqli_num_rows($orders_query);
	if($num == 0){
		echo '<p class="fs-3" style="color:var(--bs-red)">No New Orders</p>';	
	}
	else {
?>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th scope="col">Food</th>
				<th scope="col">Number</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Address</th>
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
				</tr>
				<?php
					}
			?>
		</tbody>
	</table>
</div>
<!-- End of Orders -->
<?php
	}	// End of else statement
?>

<!-- Subscriber info -->
<?php
	$subscription_query = query("SELECT * FROM subscription INNER JOIN subs_notice ON subscription.chef_id = subs_notice.user_id WHERE subs_notice.user_id='{$_SESSION['user']}'");
	confirm($subscription_query);
?>
<h2 id="subscribers-title">New Subscribers</h2>
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
			<?php
				if(mysqli_num_rows($subscription_query) == 0){
					echo '<tr><td colspan="5"><p class="fs-3" style="color:var(--bs-red)">No Subscribers Yet</p></td></tr>';
				}
				else {
					for($i = 1; $subscription_info = mysqli_fetch_array($subscription_query); $i++){
			?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $subscription_info['firstname'];?></td>
						<td><?php echo $subscription_info['address'];?></td>
						<td><?php echo $subscription_info['ph_number'];?></td>
						<td><?php echo '2023 February 14' ;?></td>
					</tr>
			<?php
					}	// end of for loop
				}	// end of else statement
			?>
		</tbody>
	</table>
</div>
<!-- End of Subscriber info -->