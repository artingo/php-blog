<?php
$userId = $_POST['userId'];
$user = $GLOBALS['users'][$userId];
if (!$user) {
	header("location: /users");
}
$user = User::fromObject($user);
loadView("users/edit", "[Edit] " . $user->name, ['user' => $user]);