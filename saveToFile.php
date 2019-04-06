<?php
require 'vendor/autoload.php';
require 'parseFunction.php' ;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$users = [
  'anastasia_a_fomina',
  'alexandramitroshina',
  'reira_reira',
  'alexis_mode',
];

$usersInfo = [];
foreach ($users as $key => $user) {
  $usersInfo[$key] = parse($user);
}

foreach ($usersInfo as $key => $user) {
  // создаем структуру excel-файла
  // $sheet->setCellValue('A1', 'Hello World !');
  $sheet->setCellValue('A' . strval($key + 1), $user['nickname']);
  $sheet->setCellValue('B' . strval($key + 1), $user['full_name']);
  $sheet->setCellValue('C' . strval($key + 1), $user['biography']);
  $sheet->setCellValue('D' . strval($key + 1), $user['average_likes']);


  // echo '<pre>'; print_r($user); echo '</pre>';
}

// упаковываем его и сохраняем в файл на сервере
// $writer = new Xlsx($spreadsheet);
// $writer->save('docs/parseResult.xlsx');