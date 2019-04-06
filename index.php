<?php
// require 'vendor/autoload.php';
// require 'saveToFile.php';

// echo '<pre>'; print_r($usersInfo); echo '</pre>';

$data = file_get_contents('php://input');
$data = json_decode($data, true);

ob_start();
print_r($data);
$out = ob_get_clean(); 
file_put_contents('message.txt', $out);