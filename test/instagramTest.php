<?php

use Eaglewatch\Search\Instagram;

require_once __DIR__ . '/../vendor/autoload.php';


$instagram = new Instagram();


$response = $instagram->searchByUserId('2222');  
print_r($response);