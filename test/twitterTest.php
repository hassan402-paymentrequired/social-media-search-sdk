<?php

use Eaglewatch\Search\Twitter;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Twitter())->search('Vdm');

print_r($response);
