<?php
$postId = $_POST['postId'];
unset($GLOBALS['posts'][$postId]);
saveData('posts');
header("location: /posts");