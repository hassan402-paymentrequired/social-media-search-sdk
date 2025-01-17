<?php


use Eaglewatch\Search\WhatsApp;

require_once __DIR__ . '/../vendor/autoload.php';


$whatsApp = new WhatsApp();


$response = $whatsApp->validateUserNumber('+2349158464994');  
print_r($response);