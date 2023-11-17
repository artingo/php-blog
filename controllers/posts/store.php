<?php
require BASE_PATH . "/model/Post.php";

$newPost = new Post($_POST['title'], $_POST['body'], 1, $_POST['categories']);
saveData('posts', $newPost);

header("location: /posts");
exit();