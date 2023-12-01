<?php
require_once "../functions.php";
loadData("users");
loadData("categories");
loadData("posts");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
	'/' => BASE_PATH . '/controllers/posts/index.php',
	'/posts' => BASE_PATH . '/controllers/posts/index.php',
	'/posts/create' => BASE_PATH . '/controllers/posts/create.php',
	'/posts/update' => BASE_PATH . '/controllers/posts/update.php',
	'/posts/save' => BASE_PATH . '/controllers/posts/save.php',
	'/posts/delete' => BASE_PATH . '/controllers/posts/delete.php',
	'/categories' => BASE_PATH . '/controllers/categories.php',
	'/users' => BASE_PATH . '/controllers/users/index.php',
	'/users/create' => BASE_PATH . '/controllers/users/create.php',
	'/users/update' => BASE_PATH . '/controllers/users/update.php',
	'/users/save' => BASE_PATH . '/controllers/users/save.php',
];


if (array_key_exists($uri, $routes)) {
	require_once $routes[$uri];
} else {
	$id = intval(basename($uri));
	// check if `$uri` starts with 'posts'
	if (strpos($uri, "/posts/") !== false && $id) {
			require_once BASE_PATH . '/controllers/posts/read.php';
			return;
	}
	if (strpos($uri, "/users/") !== false && $id) {
		require_once BASE_PATH . '/controllers/users/read.php';
		return;
	} else {
		http_response_code(404);
		loadView("404");
	}
}
