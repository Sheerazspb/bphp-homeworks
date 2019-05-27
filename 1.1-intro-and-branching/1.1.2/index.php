<?php
//  Ваш программный код, в котором определяются значения 
//  переменных для последующего задания текста и стилей
$time = date(“H”);
$day =  date(“N”);
$time = 19;
$day = 5;
if ($day == 1){
    $day = 'Monday';
} elseif ($day == 2) {
    $day = 'Tuesday';
} elseif ($day == 3) {
    $day = 'Wednesday';
} elseif ($day == 4) {
    $day = 'Thursday';
} elseif ($day == 5) {
    $day = 'Friday';
} elseif ($day == 6) {
    $day = 'Saturday';
} elseif ($day == 7) {
    $day = 'Sunday';
} else {
    $day = 'undefined';
}

if ($time >= 6 && $time < 11) {
    $greeting = 'Good Morning! <hr> Today is';
    $background = "https://avatars.mds.yandex.net/get-pdb/34158/0369f796-1882-4aa2-95bd-5a37df5edfa3/s1200";
} elseif ($time >= 11 && $time < 18) {
    $greeting =  'Good Afternoon! <hr> Today is';
    $background = "https://www.sdetmi.com/assets/Uploads/Event/21579/6871667-sunshine-wallpaper.jpg";
} elseif ($time >= 18 && $time < 23) {
    $greeting = 'Good Evening! <hr> Today is';
    $background = "https://www.nastol.com.ua/pic/201310/1920x1080/nastol.com.ua-62894.jpg";
} else {
    $greeting = 'Good Night! <hr> Today is';
    $background = "https://f.vividscreen.info/soft/63814620fc10c2b9f91c5615a1461667/City-In-Moonlight-2880x1920.jpg";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <!-- подключение стилевого файла -->
    
</head>
<body style="background: url(<?= $background ?>) no-repeat; background-size: 100%; text-align: center">
    <h1 style="display: inline-block; margin: 350px auto 0; padding: 20px; background: #b9bcbb; opacity: 0.7;
    border-radius:
    50px"><?= $greeting . ' ' . $day?></h1>
</body>
</html>