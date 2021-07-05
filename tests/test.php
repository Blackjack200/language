<?php
require_once "./../vendor/autoload.php";

$lang = new blackjack200\language\BaseLang(json_decode(file_get_contents('test.json'), true));

var_dump($lang->translate('test.start'));
var_dump($lang->translate('test.success', [
	'T' => microtime(true)
]));