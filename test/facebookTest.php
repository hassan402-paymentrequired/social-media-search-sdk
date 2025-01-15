<?php

use Eagleworld\Search\Facebook;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Facebook())->search('example');

print_r($response);
