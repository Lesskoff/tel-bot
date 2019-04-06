<?php

$data = file_get_contents('php://input');
$data = json_decode($data, true);


// const TOKEN    = '679495697:AAHsdBVwECdUUXKNwxrXWDVSGnE5TkJ-Q44';
// const BASE_URL = 'https://api.telegram.org/bot' . TOKEN . '/';

// function sendRequest ($method, $params = '') {

//   if (!empty($params)) {
//     $url = BASE_URL . $method . '?' . http_build_query($params);
//   } else {
//     $url = BASE_URL . $method;
//   }

//   return json_decode((file_get_contents($url)), JSON_OBJECT_AS_ARRAY);

// }

// $updates = sendRequest('getUpdates');

// foreach ($updates['result'] as $update) {
//   $chatId = $update['message']['chat']['id'];
//   // sendRequest('sendMessage', ['chat_id' => $chatId, 'text' => 'Answer']); // отправляем ответ
//   echo 'Hello' . '<br>';
// }
