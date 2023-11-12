<?php
$data = [];
$filename = "../data/posts.json";

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $data = json_decode($content);
    print_r($data);
}

