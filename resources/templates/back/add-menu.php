<?php
require_once("../../config.php");
if(!isset($_POST['name'])){
	redirect("index.php");
}
	$id = uuid();
	$name = escape_string($_POST['name']);
	$description = escape_string($_POST['description']);
	$price = escape_string($_POST['price']);
	$ingredients = escape_string($_POST['ingredients']);
	
	/*********** For image uploading *******/
	$total_img = count($_FILES['file']['name']);	// total number of images
	$upload_dir = "../../../public/assets/img/menu/";	// directory where file is placed
	
	for($i = 0; $i < $total_img; $i++){
		$upload_file = $upload_dir . basename($_FILES['file']['name'][$i]);	// path of file to be uploaded
		$upload_ok = true;	// false if file uploading conditions are not ideal
		$img_file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));	// file extension in lower case
		
		if($img_file_type != "jpg" && $img_file_type != "png" && $img_file_type != "jpeg" && $img_file_type != "gif" ) {	// Allow certain file formats
			set_message("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
			$upload_ok = false;
		}
		
		// if($_FILES['file']['size'] > 500000){	// Check file size
		// 	set_message("Sorry, your file is too large.");
		// 	$uploadOk = false;
		// }

		if($upload_ok) {	// if everything is alright, upload image
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $upload_file)) {
				rename($upload_file, $upload_dir . $id . "_$i.$img_file_type");
				$upload_file = str_ireplace("../", '', $upload_file);

				set_message("Listing added");
			}
			else {
				set_message("Sorry, there was an error uploading your file.");
			}
		}
	}
	$insert_query = query( "INSERT INTO menu (id, name, price, ingredients, user_id, description) VALUES ('{$id}', '{$name}', {$price}, '{$ingredients}', '{$_SESSION['user']}', '{$description}')" );
	confirm($insert_query);
	redirect("../../../public/chef.php?nav=menu");
?>