<?php

/* Author: Lucent Rai
 * Date: 2023-01-14
 */

$upload_directory = "uploads";

/************************ HELPER FUNCTIONS ************************/
function last_id(){
	global $connection;
	return mysqli_insert_id($connection);
}

function set_message($msg){
	if(!empty($msg)) {
		$_SESSION['message'] = $msg;
	}
	else {
		$msg = "";
	}
}

function display_message() {
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	return header("Location: $location ");
}

function query($sql) {
	global $connection;
	return mysqli_query($connection, $sql);
}

function confirm($result){
	global $connection;

	if(!$result) {
		die("QUERY FAILED " . mysqli_error($connection));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
	return mysqli_fetch_array($result);
}

function uuid() {
	$data = openssl_random_pseudo_bytes(16);
	assert(strlen($data) == 16);
	
	$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
	$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
	
	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/************************ END OF HELPER FUNCTIONS ************************/

/**************************** FRONT END FUNCTIONS ************************/
function login_user(){
	if(isset($_POST['submit'])){
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);

		$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
		confirm($query);

		if(mysqli_num_rows($query) == 0) {
			set_message("Your Password or Username are wrong");
			redirect("login.php");
		}
		else {
			$_SESSION['username'] = $username;
			redirect("admin");
		}
	}
}

function send_message() {
	if(isset($_POST['submit'])){ 
		$to          = "someEmailaddress@gmail.com";
		$from_name   =   $_POST['name'];
		$subject     =   $_POST['subject'];
		$email       =   $_POST['email'];
		$message     =   $_POST['message'];

		$headers = "From: {$from_name} {$email}";

		$result = mail($to, $subject, $message,$headers);

		if(!$result) {
			set_message("Sorry we could not send your message");
			redirect("contact.php");
		}
		else {
			set_message("Your Message has been sent");
			redirect("contact.php");
		}
	}
}

/**************************** END OF FRONT END FUNCTIONS ************************/

/****************************BACK END FUNCTIONS************************/
function get_user_info(){
	$query = query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
	confirm($query);
	$row = mysqli_fetch_array($query);
	$_SESSION['firstname'] = $row['firstname'];
	$_SESSION['lastname'] = $row['lastname'];
}
/**************************** END OF BACK END FUNCTIONS ************************/
?>