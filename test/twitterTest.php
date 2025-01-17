<?php

use Eagleworld\Search\Twitter;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Twitter())->search('hassan');

print_r($response);
