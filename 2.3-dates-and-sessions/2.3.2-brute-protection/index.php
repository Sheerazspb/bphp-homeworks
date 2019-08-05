<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

function login($users) {
    if (array_key_exists($_POST['login'], $users)) {
        if ($users[$_POST['login']] === $_POST['password']) {
            echo 'You are successfully logged in!';
            return true;
        }
    }
    echo 'incorecct password or login!';
    return false;
}

function check($users) {
    if (login($users) === true) {
        exit;
    } else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['time'] = time();
        $_SESSION['counter'] = 1;
        return;
    }
}

function usersAttempts($users) {
    session_set_cookie_params(1800);
    session_start();
 
    if (count($_SESSION) == 0) {
        check($users);
        return;
    }
 
    if ($_SESSION['login'] === $_POST['login']) {
        
        $_SESSION['counter'] += 1;
        
        if (((time() - $_SESSION['time']) <= 5) && ($_SESSION['counter'] === 2)) {
            
            echo 'too many attempts try again later after one minut!';
            
            $file = 'data.txt';
            $userFile = fopen($file, 'a');
            $date = $_POST['login'] . ': ' . date('d.m.Y H:i:s') . "\n";
            fwrite($userFile, $date);
            fclose($fpFile);
            
        } elseif ((time() - $_SESSION['time']) < 30) {
            $_SESSION['counter']++;
            if ($_SESSION['counter'] > 3) {
                $_SESSION['counter'] = 0;
                echo 'too many attempts try again later after one minut!';
                
                $file = 'data.txt';
                $userFile = fopen($file, 'a');
                $date = $_POST['login'] . ': ' . date('d.m.Y H:i:s') . "\n";
                fwrite($userFile, $date);
                fclose($fpFile);
            }
 
        } elseif ((time() - $_SESSION['time']) > 30) {
            $_SESSION = [];
            check($users);
            return;
        }
 
    } else {
        check($users);
        return;
    }
}
 
usersAttempts($users);
