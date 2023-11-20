<?php
require BASE_PATH . "/model/Post.php";

$newPost = new Post($_POST['title'], $_POST['body'], intval($_POST['userId']), $_POST['categories']);
saveData('posts', $newPost);
header("location: /posts");