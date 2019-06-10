<?php
session_start();
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];
$login = $_POST["login"];
$pass = $_POST["password"];
$ip = '192.168.1.0';
foreach ($users as $key => $value) {
    if ($key === $login && $pass === $value) {
        echo "you are logged in";
        return true;
    }
}
$currentTime = time();
$timeFromCookies = $_COOKIE["date"];
if ($currentTime - $timeFromCookies < 5) {
    $date = date('d.m.Y H:i:s');
    $file = fopen("${login}", 'a');
    fwrite($file, "${date} : ${$ip} \n");
    fclose($file);
    echo "too many attemts try again later after one minut";
    return false;
} else {
    setcookie("date", time());
    setcookie("ip", $ip);
    $_SESSION["date"] = time();
    $_SESSION["ip"] = $ip;
    echo "incorecct password or login";
    return false;
}
