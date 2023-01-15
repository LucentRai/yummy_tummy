<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Current Subscribers</h1>
</div>

<!-- Subscriber info -->
<?php
	if(isset($_POST['remove-subscription'])){
		$orders_query = query("DELETE FROM subscription WHERE subs_id='{$_POST['remove-subscription']}'");
		confirm($orders_query);
	}
	$subscription_query = query("SELECT * FROM subscription INNER JOIN users ON subscription.user_id = users.id AND subscription.chef_id='{$_SESSION['user']}'");
	confirm($subscription_query);
?>
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
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for($i = 1; $subscription_info = mysqli_fetch_array($subscription_query); $i++){
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $subscription_info['firstname'];?></td>
				<td><?php echo $subscription_info['address'];?></td>
				<td><?php echo $subscription_info['ph_number'];?></td>
				<td><?php echo '2023 February 14' ;?></td>
				<td scope="col"><form action="chef.php?nav=subscription" method="post"><button type="submit" class="btn primary-btn" name="remove-subscription" value="<?php echo $subscription_info['subs_id']; ?>"><i class="fa-solid fa-trash"></i></button></form></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<!-- End of Subscriber info -->