<?php
require "../model/User.php";

$users = [];
$pwd = 'p@$$w0rd23!';
for ($id = 1; $id <= 3; $id++) {
    $user = new User("Freddie_" . $id,
        "alfred.walther.ext@iu.org",
        $pwd . $id
    );
    $users[$id] = $user;
}

$file = fopen("../data/users.json", "w+");
//$data['users'] = $users;
$json = json_encode($users, JSON_PRETTY_PRINT);
fwrite($file, $json);
fclose($file);

echo $json;

