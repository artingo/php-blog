<?php
const BASE_PATH = __DIR__;

/**
 * Load JSON data from file and store it in '$GLOBALS'
 * @param $key - keyword identifying the view
 * @return void
 */
function loadData($key): array
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

function saveData($key, $newEntry)
{
    $data = loadData($key);
    $data[] = $newEntry;

    $file = fopen("../data/" . $key . ".json", "r+");
    $json = json_encode($data, JSON_PRETTY_PRINT);
    fwrite($file, $json);
    fclose($file);
}

/**
 * Load JSON data and corresponding view
 * @param $view - keyword identifying the view
 * @return void
 */
function loadView($view, $title = "")
{
    $pos = strpos($view, "/");
    $key = ($pos > 0) ? substr($view, 0, $pos) : $view;
    $data = loadData($key);

    require(BASE_PATH . "/views/partials/html-head.php");
    require(BASE_PATH . "/views/partials/top-navbar.php");
    require(BASE_PATH . "/views/partials/sidebar.php");
    require(BASE_PATH . "/views/" . $view . ".php");
    require(BASE_PATH . "/views/partials/footer.php");
}

function array2map($array)
{
    $categories = [];
    foreach ($array as $item) {
        $categories[$item->id] = $item->name;
    }
    return $categories;
}