<?php

function parse($nickName) {
  // получаем всю html-страницу выбранного пользователя
  $text = file_get_contents ('https://www.instagram.com/' . $nickName .'/');
  // выбираем уникальный script-тег, в котором содержится json со всей информацией
  preg_match("#<script type=\"text/javascript\">window._sharedData = (.*);</script>#isUu", $text, $json);
  // тут убираем лишние теги из строки, чтобы получился чистый json
  $json = str_replace('<script type="text/javascript">window._sharedData = ', '', $json);
  $json = trim(current($json), ';</script>');
  // декодируем json, чтобы php воспринял это как обычный массив
  $json = json_decode($json, true);

  // здесь мы просто погружаемся в массив, в котором содержится нужная нам инфа
  $json = current($json['entry_data']['ProfilePage']);
  $json = $json['graphql']['user'];

  $parseResult = []; // создаем массив с результатами пользователя
  $sum = 0; // создаем переменную, в которую будем пихать сумму полследних 10ти лайков

  // перебираем массив с лайками, чтобы получить сумму последних 10ти
  foreach($json['edge_owner_to_timeline_media']['edges'] as $key => $item) {
    if ($key > 9) break; // ограничиваемся десятью

    $like = current($item['node']['edge_liked_by']);
    $sum += $like;
  }

  $parseResult['nickname'] = $nickName;             // записываем описание пользователя
  $parseResult['biography'] = $json['biography'];   // записываем описание пользователя
  $parseResult['full_name'] = $json['full_name'];   // записываем его полное имя
  $parseResult['average_likes'] = $sum / 10;        // вычисляем и записываем среднее кол-во последних 10ти лайков

  return $parseResult;

  // echo '<pre>'; print_r($parseResult); echo '</pre>';
}


/*
<ul>
<li>Nickname: <?= $user['nickname'] ?></li>
<li>Full name: <?= $user['full_name'] ?></li>
<li>Description: <?= $user['biography'] ?></li>
<li>Average likes: <?= $user['average_likes'] ?></li>
</ul>
*/

// //Инициализируем cURL-сессию
// $ch = curl_init ("https://www.instagram.com/alexandramitroshina/");
 
// //открываем для записи файл parse.txt
// //сюда внесём исходный html-код
// $fp = fopen ("parse.txt", "w");
 
// //указываем куда копировать содержимое
// curl_setopt ($ch, CURLOPT_FILE, $fp);
 
// //Заголовок - не выводим
// curl_setopt ($ch, CURLOPT_HEADER, 0);

// // $ch = preg_match( '/<script type="text\\/javascript">window._sharedData = (.*?)<\\/script>/is' , $ch , $json );
// // $result = str_replace('<script type="text/javascript">window._sharedData = ',"",$ch);
// // $result = str_replace("</script>","",$ch);
 
// //Поехали!
// curl_exec ($ch);
 
// //Закрываем cURL-сессию
// curl_close ($ch);
 
// //Закрываем дексриптор файла
// fclose ($fp);
 
// //И вставляем на страницу полученный код
// include 'parse.txt';