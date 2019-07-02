<?php
include 'autoload.php';
include 'config/SystemConfig.php';
include 'classes/JsonFileAccessModel.php';
$jsonObj = new JsonFileAccessModel('users');
$json = $jsonObj->readJson();
var_dump($json);
?>
