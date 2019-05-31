<?php
$login = $_POST['login'];
$pass = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$code = $_POST['code'];
$codeWord = 'code';
$isCorrect = true;
$patternLogin = '/\W/';
if (preg_match($patternLogin, $login)) {
    echo 'Поле логин не должно содержать символы @/*?,;:. <br>';
    $isCorrect = false;
}
if (strlen($pass) < 8) {
    echo 'Длина пароля должна быть минимум 8 символов <br>';
    $isCorrect = false;
}
$patternEmail = '/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/';
if (!preg_match($patternEmail, $email)) {
    echo 'Почта должна быть формата почта@домен.доменнаязона <br>';
    $isCorrect = false;
}
if (strlen($firstName) === 0) {
    echo 'Поле Имя не может быть пустым <br>';
    $isCorrect = false;
}
if (strlen($lastName) === 0) {
    echo 'Поле Фамилия не может быть пустым <br>';
    $isCorrect = false;
}
if (strlen($middleName) === 0) {
    echo 'Поле Отчество не может быть пустым <br>';
    $isCorrect = false;
}
if ($codeWord !== trim(strtolower($code))) {
    echo 'Вы неверно указали Кодовое слово <br>';
    $isCorrect = false;
}
if ($isCorrect) {
    echo 'Вы успешно зарегистрировались!<br>';
}
