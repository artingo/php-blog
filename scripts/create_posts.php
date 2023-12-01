<?php
require "../model/Post.php";

$data = array();

for ($id = 1; $id <= 5; $id++) {
	$post = new Post("Post no " . $id,
		$id . ". Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
		($id % 3) + 1
	);
	$data[$id] = $post;
}

$file = fopen("../data/posts.json", "w+");
$json = json_encode($data, JSON_PRETTY_PRINT);
fwrite($file, $json);
fclose($file);

echo $json;


