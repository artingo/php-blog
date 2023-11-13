<?php

/**
 * Load JSON data from file and store it in '$GLOBALS'
 * @param $key - keyword identifying the view
 * @return void
 */
function loadData($key) : array
{
    $data = [];
    $filename = "../data/" . $key . ".json";

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $data = json_decode($content);
    }
    $GLOBALS[$key] = $data;
    return $data;
}

/**
 * Load JSON data and corresponding view
 * @param $view - keyword identifying the view
 * @return void
 */
function loadView($view)
{
    $data = loadData($view);
    extract($data);

    require("views/partials/html-head.php");
    require("views/partials/top-navbar.php");
    require("views/partials/sidebar.php");
    require("views/" . $view . ".php");
    require("views/partials/footer.php");
}