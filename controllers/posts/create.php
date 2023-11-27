<?php
$newPost = new Post("", "", null, []);
loadView("posts/edit", "New blog post", ['post' => $newPost]);