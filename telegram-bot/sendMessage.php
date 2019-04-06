<?php

// 392037130

const TOKEN = '679495697:AAHsdBVwECdUUXKNwxrXWDVSGnE5TkJ-Q44';

$url = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage';

$params = [
  'chat_id' => 392037130,
  'text' => 'Fuck you!'
];

$url = $url . '?' . http_build_query($params);

$response = json_decode((file_get_contents($url)), JSON_OBJECT_AS_ARRAY);

echo '<pre>'; print_r($response); echo '</pre>';