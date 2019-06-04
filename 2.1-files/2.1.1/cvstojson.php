<?php
$file = fopen('data.csv', 'r');
$firstLine = fgetcsv($file, 1000, ';');
$name = $firstLine[0];
$art = $firstLine[1];
$price = $firstLine[2];
$json = [];
while ($str = fgetcsv($file, 1000, ';')) {
    $json[] = [
        $name => $str[0],
        $art => $str[1],
        $price => $str[2],
    ];
}
fclose($file);
file_put_contents('data.json', json_encode($json));