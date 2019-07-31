<?php

session_start();

$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

if(isset($_POST['submit'])) {

    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 0;
    };    

    $login = $_POST['login'];
    $pass = $_POST['password'];

    if(array_key_exists($login, $users) && $users[$login] === $pass) {

        echo 'You are successfully logged in!';
        return true;
        
    } else {

        $_SESSION['counter'] += 1;

        setcookie('error[' . $_SESSION['counter'] . ']', time());

        if (isset($_COOKIE['error'])) {

            if ((time() - $_COOKIE['error'][$_SESSION['counter'] - 1]) < 5 || (time() - $_COOKIE['error'][$_SESSION['counter'] - 2]) < 60) {

                $date = date("j F Y, g:i a");
                $file = fopen("${login}", 'a');
                fwrite($file, "${date} \n");
                fclose($file);

                echo 'too many attempts try again later after one minut!';
                return false;

            } else {
                setcookie("date", time());
                $_SESSION["date"] = time();
                echo 'incorecct password or login!';
                return false;
            }
        }
    }
}
 