<?php

/**
 * Load JSON data from file and store it in '$GLOBALS'
 * @param $key - keyword identifying the view
 * @return void
 */
function loadData($key)
{
    $data = [];
    $filename = "../data/" . $key . ".json";

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $data = json_decode($content);
    }

    extract($data);
    $GLOBALS[$key] = $data;
}

/**
 * Load JSON data and corresponding view
 * @param $view - keyword identifying the view
 * @return void
 */
function loadView($view)
{
    loadData($view);
    require("../views/" . $view . ".php");

}