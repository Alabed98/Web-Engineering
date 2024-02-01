<!DOCTYPE html>
<html lang="en">

<body>
<?php

$users = [];

if (file_exists('users.txt')) {
    $file = fopen('users.txt', 'r');
    $content = fread($file, filesize('users.txt'));
    fclose($file);
    $users = unserialize($content);
}

$name =  $_POST["name"];
$password =  $_POST["password"];


if (!array_key_exists($name, $users)) {
    $users[$name] = [
        'username' => $name,
        'password' => $password
    ];

    $file = fopen('users.txt', 'w');
    fwrite($file, serialize($users));
    fclose($file);
    
    echo "Registrierung erfolgreich!";
} else {
    echo "Benutzername ist bereits vergeben!";
}
?>

</body>
</html>