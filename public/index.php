<?php
require("../functions.php");
loadData("users");
loadData("categories");
loadData("posts");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/' =>             BASE_PATH . '/controllers/posts/index.php',
    '/posts' =>        BASE_PATH . '/controllers/posts/index.php',
    '/posts/create' => BASE_PATH . '/controllers/posts/create.php',
    '/posts/save' =>   BASE_PATH . '/controllers/posts/store.php',
    '/categories' =>   BASE_PATH . '/controllers/categories.php',
    '/users' =>        BASE_PATH . '/controllers/users.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    loadView("404");
}