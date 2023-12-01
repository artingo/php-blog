<?php
$newUser = new User("", "", "");
loadView("users/edit", "New user", ['user' => $newUser]);