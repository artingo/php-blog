<?php

function loadView($view)
{
    $data = [];
    $filename = "../data/" . $view . ".json";

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $data = json_decode($content);
    }
    extract($data);
    require("../views/" . $view . ".php");

}