<?php
require_once BASE_PATH . "/model/User.php";

$isExistingUser = $_POST['isExistingUser'];
// remove temporary fields
unset($_POST['isExistingUser']);
unset($_POST['password2']);

if ($isExistingUser) {
	$userId = $_POST['id'];
	$user = $GLOBALS['users'][$userId];
	if ($user) {
		// Check if password was provided and hash it
		if (!empty($_POST['password'])) {
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}

		// Update the existing user with the <form> fields
		$GLOBALS['users'][$userId] = array_merge((array)$user, $_POST);
		saveData('users');
	}
} else {
	$newUser = new User($_POST['name'], $_POST['email'], $_POST['password'], $_POST['avatarUrl']);
	saveData('users', $newUser);
}
header("location: /users");
