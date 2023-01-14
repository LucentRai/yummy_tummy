<?php
	require_once("../resources/config.php");

	if (isset($_POST['user-login'])){
		$username = escape_string($_POST['username']);
		$user_password = escape_string($_POST['password']);
		$query = query("SELECT * FROM users WHERE username = '{$username}'");
		confirm($query);

		if (mysqli_num_rows($query) == 0){	// username does not match any records
			set_message("Username or password is incorrect.");
			unset($_POST['user-login']);
			redirect("login.php");
		}
		
		$row = mysqli_fetch_array($query);
		if (password_verify($user_password, $row['password_hash'])){
			$_SESSION['user'] = $row['username'];
			redirect("index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins">

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Open Sans">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    />
    <link rel="stylesheet" href="./css/chef-login.css" />
    <title>Chef Login</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="logo">
        <img src="https://img.icons8.com/emoji/48/000000/man-cook.png"/>
      </div>
      <div class="text-center mt-4 name"></div>
      <form class="p-3 mt-3">
        <div class="form-field d-flex align-items-center">
          <span class="far fa-user"></span>
          <input
            type="text"
            name="userName"
            id="contactNumber"
            placeholder="Contact Number"
          />
        </div>
        <div class="form-field d-flex align-items-center">
          <span class="fas fa-key"></span>
          <input
            type="password"
            name="password"
            id="pwd"
            placeholder="Password"
          />
        </div>
        <button class="btn mt-3">Login</button>
      </form>
      <div class="text-center fs-6">
        <a href="#">Forget password?</a> or <a href="chef-signup.html">Sign up</a>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
