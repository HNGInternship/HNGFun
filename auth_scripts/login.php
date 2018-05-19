<?php
require('db.php');

$errors = [];
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// set constant fot the root url 
	define("ROOT_URL", $_SERVER['SERVER_NAME']);

	$username = $_POST['username'];
	$password = $_POST['password'];

	// Simple validation
	if(is_blank($username)) {
		$errors[] = "Username cannot be blank.";
	}

	if(is_blank($username)) {
		$errors[] = "Password cannot be blank.";
	}

	//
	if(empty($errors)) {

		$user = find_user_by_id($username);
		$login_failure = "Log in was unsuccessful.";
		
		if($user) {
			
			if(password_verify($password, $user->password)) {
				// password matches
				login_user($user);
				redirect_to(url_for('/listing.php'));
			} else {
				// username found, but password does not match
				$errors['blank'] = $login_failure;
			}
		} else {
			// no user 
			$errors['blank'] = $login_failure;
		}
	}
	
}


//Path resolution
function url_for($path) {

	if($path[0] != '/') {
		$path = "/" . $path;
	}
	return ROOT_URL . $path;
}

function find_user_by_id($id) {
	global $conn;

	$sql = "SELECT * from users WHERE user_id = '".$id."' LIMIT 1";
	  try {
         $query = $conn->query($sql);
		 $user = $query->fetch(PDO::FETCH_OBJ);
		 echo $user;
    } catch (PDOException $e) {
        throw $e;
    }
}
 
//Check for blank input
function is_blank($val) {
	$input = trim($val);
	if($input === '' || null) {
		return true;
	}

	return false;
}

//Redirect pages
function redirect_to($location) {
	header("Location: " . $location);
	exit;
}

//Perform all login 
function login_user($user) {

	session_regenerate_id();
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['last_login'] = time();

	return true;
}
