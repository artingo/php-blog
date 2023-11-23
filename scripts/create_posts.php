<?php
require "../model/Post.php";

$data = array();

for ($i = 1; $i <= 5; $i++) {
	$post = new Post("Post no " . $i,
		$i . ". Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
		($i % 3) + 1
	);
	$data[$i] = $post;
}

$file = fopen("../data/posts.json", "w+");
$json = json_encode($data, JSON_PRETTY_PRINT);
fwrite($file, $json);
fclose($file);

echo $json;


