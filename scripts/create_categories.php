<?php
require "../model/Category.php";

$categories = [];
$categoryNames = ["Attractions", "Beaches", "Cities", "Escape Rooms", "Mountains", "Museums"];

foreach ($categoryNames as $name) {
    $categories[] = new Category($name);
}

$file = fopen("../data/categories.json", "w+");
$json = json_encode($categories, JSON_PRETTY_PRINT);
fwrite($file, $json);
fclose($file);

echo $json;

