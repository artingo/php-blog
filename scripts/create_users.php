<?php
require "../model/User.php";

$users = [];
$pwd = 'p@$$w0rd23!';
for ($i = 1; $i <= 3; $i++) {
    $user = new User("Freddie_" . $i,
        "alfred.walther.ext@iu.org",
        $pwd . $i
    );
    $users[] = $user;
}

$file = fopen("../data/users.json", "w+");
//$data['users'] = $users;
$json = json_encode($users, JSON_PRETTY_PRINT);
fwrite($file, $json);
fclose($file);

echo $json;

