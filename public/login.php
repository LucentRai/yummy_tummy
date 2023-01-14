<?php
	require_once("../resources/config.php");

	if (isset($_POST['user-login'])){
		$ph_number = escape_string($_POST['ph_number']);
		$user_password = escape_string($_POST['password']);
		$query = query("SELECT * FROM users WHERE ph_number = '{$ph_number}'");
		confirm($query);

		if (mysqli_num_rows($query) == 0){	// Phone number does not match any records
			set_message("Phone number or password is incorrect.");
			unset($_POST['user-login']);
			redirect("login.php");
		}
		
		$row = mysqli_fetch_array($query);
		if (password_verify($user_password, $row['password_hash'])){
			$_SESSION['user'] = $row['id'];
			if($row['type'] == CLIENT_USER){
				redirect("customer.php");
			}
			else{
				redirect("chef.php");
			}
		}
	}

	require('../resources/templates/front/header.php');
?>
		<link rel="stylesheet" href="./css/chef-login.css" />
		<title>Login</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="logo">
				<img src="https://img.icons8.com/emoji/48/000000/man-cook.png"/>
			</div>
			<div class="text-center mt-4 name">
				<span ><?php display_message(); ?></span>
			</div>
			<form class="p-3 mt-3" method="post">
				<div class="form-field d-flex align-items-center">
					<span class="far fa-user"></span>
					<input
						type="text"
						name="ph_number"
						placeholder="Phone Number"
					/>
				</div>
				<div class="form-field d-flex align-items-center">
					<span class="fas fa-key"></span>
					<input
						type="password"
						name="password"
						placeholder="Password"
					/>
				</div>
				<input type="submit" class="btn mt-3" name="user-login" value="Log in">
			</form>
			<div class="text-center fs-6">
				<a href="#">Forget password?</a> or <a href="register.php">Sign up</a>
			</div>
		</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
