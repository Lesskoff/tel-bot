<?php

const TOKEN    = '679495697:AAHsdBVwECdUUXKNwxrXWDVSGnE5TkJ-Q44';
const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

$method = 'setWebhook';

$url = BASE_URL . $method;

$options = [
  'url' => 'https://haseri.site/parser/index.php'
];

$response = file_get_contents($url . '?' . http_build_query($options));

print_r($response);