<?php
require_once BASE_PATH . "/model/Post.php";

$isExistingPost = $_POST['isExistingPost'];
// remove temporary field
unset($_POST['isExistingPost']);

if ($isExistingPost) {
	$postId = $_POST['id'];
	$post = $GLOBALS['posts'][$postId];
	if ($post) {
		// update the existing post with the <form> fields
		$GLOBALS['posts'][$postId] = array_merge((array)$post, $_POST);
		saveData('posts');
	}
} else {
	$newPost = new Post($_POST['title'], $_POST['body'], intval($_POST['userId']), $_POST['categories']);
	saveData('posts', $newPost);
}
header("location: /posts");