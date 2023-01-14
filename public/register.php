<?php
require_once("../resources/config.php");

if (isset($_POST['user-sign-up'])){
	$ph_number = escape_string($_POST['ph_number']);
	
	/* if phone number already exists show warning */
	$query = query("SELECT * FROM users WHERE ph_number = '{$ph_number}'");
	confirm($query);
	if (mysqli_num_rows($query) != 0){
		set_message("Phone Number already Exists");
		unset($_POST['user-sign-up']);
		redirect("register.php");
	}
  $id = uuid();
  $firstname = escape_string($_POST['firstname']);
  $lastname = escape_string($_POST['lastname']);
	$email = escape_string($_POST['email']);
  $address = escape_string($_POST['address']);
  $plus_code = ' ';
  $type = $_POST['type'];
	$password = escape_string($_POST['password']);
	$pwd_hash = password_hash($password, PASSWORD_DEFAULT);
	
	$query = query("INSERT INTO users (id, firstname, lastname, ph_number, email, address, plus_code, type, password_hash) VALUES ('{$id}', '{$firstname}', '{$lastname}', '{$ph_number}', '{$email}', '{$address}', '{$plus_code}', '{$type}', '{$pwd_hash}')");
	confirm($query);

	$_SESSION['user'] = $id;

	redirect("user.php?u_id={$id}");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chef Signup</title>
  <link rel="stylesheet" href="./css/chef-signup.css">
</head>
<body>
    
<div class="signupFrm" id="sign-up">
	<form action="register.php" method="post" class="form">
	<div class="inputContainer">
			<input type="text" class="input" required name="firstname">
			<label for="firstname" class="label">Firstname</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="lastname">
			<label for="lastname" class="label">Lastname</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="address">
			<label for="address" class="label">Address</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="ph_number">
			<label for="ph_number" class="label">Contact Number</label>
		</div>
		
		<div class="inputContainer">
			<input type="email" class="input" required name="email">
			<label for="email" class="label">Email</label>
		</div>

		<div class="inputContainer">
			<select name="type" class="form-select">
				<option selected value="0">Consumer</option>
				<option value="1">Chef</option>
			</select>
		</div>

		<div class="inputContainer">
			<input type="password" class="input" required name="password">
			<label for="password" class="label">Password</label>
		</div>

		<div class="inputContainer">
			<input type="password" class="input" required name="password1">
			<label for="password1" class="label">Confirm Password</label>
		</div>

		<input type="submit" class="submitBtn" name="user-sign-up" value="register">
	</form>
</div>
</body>
</html>