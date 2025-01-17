<?php


use Eaglewatch\Search\WhatsApp;

require_once __DIR__ . '/../vendor/autoload.php';


$whatsApp = new WhatsApp();


$response = $whatsApp->getUserProfileByNumber('+2349029178786');  
print_r($response);