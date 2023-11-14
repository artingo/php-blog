<?php
require("../functions.php");
loadData("categories");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/' => '../controllers/posts.php',
    '/posts' => '../controllers/posts.php',
    '/categories' => '../controllers/categories.php',
    '/users' => '../controllers/users.php'
];

if(array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    loadView("404");
}