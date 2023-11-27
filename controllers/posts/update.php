<?php
$postId = $_POST['postId'];
$post = $GLOBALS['posts'][$postId];
if (!$post) {
	header("location: /posts");
}
loadView("posts/edit", "[Edit] " . $post->title, ['post' => $post]);