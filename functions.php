<?php
const BASE_PATH = __DIR__;
require_once BASE_PATH . "/model/Post.php";

/**
 * Load JSON data from file and store it in '$GLOBALS'
 * @param $key - keyword identifying the model entity
 * @return void
 */
function loadData($key): array
{
	if (empty($GLOBALS[$key])) {
		$filename = BASE_PATH . "/data/" . $key . ".json";

		if (file_exists($filename)) {
			$content = file_get_contents($filename);
			$data = json_decode($content);
			$GLOBALS[$key] = $data;

			// initialize idCounter of posts
			if ($key == 'posts') {
				Post::setIdCounter(count($data) + 1);
			}
		}
	}

	return $GLOBALS[$key] ?? [];
}

/**
 * Adds a new entry to the array found in the `$GLOBALS` with the `$key`
 * @param $key - keyword identifying the model entity
 * @param $newEntry - a new entry for the model array
 * @return void
 */
function saveData($key, $newEntry)
{
	if (empty($GLOBALS[$key])) {
		echo $key . " not found";
		var_dump($GLOBALS);
		exit();
	}

	array_push($GLOBALS[$key], $newEntry);
	$file = fopen(BASE_PATH . "/data/" . $key . ".json", "w+");
	$json = json_encode($GLOBALS[$key], JSON_PRETTY_PRINT);
	fwrite($file, $json);
	fclose($file);
}

/**
 * Load JSON data and corresponding view
 * @param $view - keyword identifying the view
 * @return void
 */
function loadView($view, $title = "", $params = [])
{
	if (empty($_SESSION['currentUser'])) {
		session_start();
		// start with UserId = 1
		$_SESSION['currentUser'] = 1;
	}
	$pos = strpos($view, "/");
	$key = ($pos > 0) ? substr($view, 0, $pos) : $view;
	$data = loadData($key);
	extract($params);

	require(BASE_PATH . "/views/partials/html-head.php");
	require(BASE_PATH . "/views/partials/top-navbar.php");
	require(BASE_PATH . "/views/partials/sidebar.php");
	require(BASE_PATH . "/views/" . $view . ".php");
	require(BASE_PATH . "/views/partials/footer.php");
}

/**
 * Creates a lookup table from an array, using the `id` as key and `name` as value
 * @param $array
 * @return array
 */
function array2map($array)
{
	$categories = [];
	foreach ($array as $item) {
		$categories[$item->id] = $item->name;
	}
	return $categories;
}

function getItem($view, $id)
{
	foreach ($GLOBALS[$view] as $item) {
		if ($item->id == $id) {
			return $item;
		}
	}
	return null;
}