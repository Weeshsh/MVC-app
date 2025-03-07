<?php

require_once "business.php";
require_once "misc.php";
function index(&$model)
{
	return "index";
}
;

function gallery(&$model)
{
	$images = iterator_to_array(get_all_images());
	$return = [];
	$counter = 0;
	foreach ($images as $image) {
		if (isset($_SESSION["logged"])) {
			if($image["public"] == $_SESSION["userID"] || $image["public"] === "public") {
				$counter++;
			}
		} else {
			if($image["public"] === "public") {
				$counter++;
			}
		}
	}

	$photos_per_page = 3;
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start_index = ($current_page - 1) * $photos_per_page;
	$total_pages = ceil($counter / $photos_per_page);

	$images = array_slice($images, $start_index, $photos_per_page);

	if(isset($_SESSION["userID"])) {
		$user_id = $_SESSION["userID"];
	} else {
		$user_id = null;
	}

	foreach ($images as $image) {
		if($image["public"] === "public" || $image["public"] === $user_id){ 
		$id = (string) $image["_id"];
		if (isset($_SESSION["favouritedImages"][$id])) {
			$image["favourited"] = "favourited";
		}
		$return[] = $image;
	}
	}

	$model["images"] = $return;
	$model["currentPage"] = $current_page;
	$model['totalPages'] = $total_pages;

	return "galleryView";
}


function upload(&$model)
{
	$model["fileTypeError"] = null;
	$model["fileSizeError"] = null;

	try {
		$file_info = finfo_open(FILEINFO_MIME_TYPE);
		$mime_type = finfo_file($file_info, $_FILES["image"]["tmp_name"]);
		if (($mime_type == "image/jpeg" || $mime_type == "image/png") && $_FILES["image"]["size"] <= 1024 * 1024) {
			$upload_dir = "images/";
			$file = $_FILES["image"];
			$temp_path = $file["tmp_name"];

			if ($mime_type == "image/jpeg") {
				$type = ".jpg";
			} else {
				$type = ".png";
			}

			if(isset($_POST["publicity"])){
				if($_POST["publicity"] === "private") {
					$is_public = (string)$_SESSION["userID"];
				} else {
					$is_public = "public";
				}
			} else {
				$is_public = "public";
			}

			$info = [
				"author" => $_POST["author"],
				"title" => $_POST["title"],
				"type" => $type,
				"public" => $is_public,
			];

			if ($id = save_image($info)) {
				$target = "{$upload_dir}./{$id}/original{$type}";
				mkdir("images/{$id}");
				move_uploaded_file($temp_path, $target);
				watermark_image($id, $type);
				return "uploadSuccess";
			}
		} else {
			if ($mime_type != "image/jpeg" && $mime_type != "image/png") {
				$model["fileTypeError"] = true;
			}
			if ($_FILES["image"]["size"] > 1024 * 1024) {
				$model["fileSizeError"] = true;
			}
			return "uploadError";
		}
	} catch (Exception $e) {
		return "uploadError";
	}
}

function loginPage(&$model)
{
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		return "loginPage";
	}
}

function login(&$model)
{
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);

		$user = get_user($username);

		if (!$user) {
			$model["noUserFound"] = 1;
			return "loginPage";
		} else {
			if (password_verify($password, $user["password"])) {
				$_SESSION["logged"] = "logged";
				$_SESSION["loggedUser"] = $username;
				$_SESSION["userID"] = (string) $user["_id"];
				$model["username"] = $username;
				return "loginSuccess";
			} else {
				$model["wrongPassword"] = 1;
				return "loginPage";
			}

		}
	}
}

function register(&$model)
{
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		return "register";
	}
}
function addUser(&$model)
{
	try {
		if (isset($_SESSION["logged"])) {
			return "redirect:/";
		} else {
			$email = htmlspecialchars($_POST["email"]);
			$username = htmlspecialchars($_POST["username"]);
			$password = htmlspecialchars($_POST["password"]);
			$repeated_password = htmlspecialchars($_POST["passRep"]);

			if (get_user($username)) {
				$model["userExists"] = true;
				$model["user"] = $username;
			}
			if ($repeated_password !== $password) {
				$model["passwordError"] = true;
			}
			if ($repeated_password === $password && !get_user($username)) {
				$new_user = [
					"email" => $email,
					"username" => $username,
					"password" => password_hash($password, PASSWORD_DEFAULT)
				];

				add_user($new_user);
				$model["registerSuccessful"] = true;
				$model["user"] = $username;
				return "registerSuccess";
			} else {
				return "register";
			}
		}
	} catch (Exception $e) {
		return "register";
	}
}

function logout(&$model)
{
	session_unset();
	session_destroy();
	session_abort();
	return "redirect:/";
}

function favourites(&$model)
{
	if (isset($_SESSION["logged"]) && count($_SESSION["favouritedImages"]) > 0) {
		foreach ($_SESSION["favouritedImages"] as $favourited) {
			$images[] = get_image($favourited);
		}
		$model["images"] = $images;
		return 'favourites';
	} else {
		return "redirect:/gallery";
	}
}

function addFavourited(&$model)
{
	foreach ($_POST as $favourited) {
		$_SESSION["favouritedImages"][$favourited] = $favourited;
	}
	return "redirect:/gallery";
}

function unfavourite(&$model)
{
	foreach ($_POST as $favourtied) {
		unset($_SESSION["favouritedImages"][$favourtied]);
	}

	if (count($_SESSION["favouritedImages"]) == 0) {
		return "redirect:/gallery";
	} else {
		return "redirect:/favourites";
	}
}

function nukeDB() {
	foreach (glob("images/*") as $dir) {
		foreach (glob($dir."/*") as $file) {
			unlink($file);
		}
		rmdir("{$dir}");
	}
	removeAll();
	return logout();
}