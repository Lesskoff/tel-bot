<?php

const TOKEN = '679495697:AAHsdBVwECdUUXKNwxrXWDVSGnE5TkJ-Q44';

$url = 'https://api.telegram.org/bot' . TOKEN . '/getUpdates';

$lastUpdate = 414892163;

$params = [
  'offset' => $lastUpdate + 1
];

$url = $url . '?' . http_build_query($params);

$response = json_decode((file_get_contents($url)), JSON_OBJECT_AS_ARRAY);

if ($response['ok']) {
  foreach ($response['result'] as $result) {
    echo $result['message']['text'] . '<br>';
  }
}

echo '<pre>'; print_r($response); echo '</pre>';