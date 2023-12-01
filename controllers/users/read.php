<?php
$user = $GLOBALS['users'][$id];
// if post isn't found, redirect to overview
if (!$user) {
	header("location: /users");
}
$user = User::fromObject($user);
loadView("users/read", "Blogger " . $user->name, ['user' => $user]);