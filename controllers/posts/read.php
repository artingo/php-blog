<?php
$post = $GLOBALS['posts'][$id];
// if post isn't found, redirect to overview
if (!$post) {
	header("location: /posts");
}
loadView("posts/read", $post->title, ['post' => $post]);