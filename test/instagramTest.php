<?php

use Eaglewatch\Search\Instagram;

require_once __DIR__ . '/../vendor/autoload.php';


$instagram = new Instagram();


$response = $instagram->searchByUsername('stanley_nwogu_');  
print_r($response);