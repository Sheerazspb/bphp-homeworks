<?php
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$code = str_replace(' ',  '', $_POST['code']);
$validCode = 'code';

if (preg_match('/\@|\;|\?|\/|\:|\*/' , $login) === 1){
    echo "Логин содержит недопустимые символы - @ / * ? , ; : <br>";
}

if (strlen($password) < 8) {
    echo "Длина пароля должна быть минимум 8 символов <br>";
}

if ($validCode !== strtolower($code)) {
    echo "Кодовое слово неверно <br>";
} 