<?php

use Eagleworld\Search\Twitter;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Twitter())->userReplies();

print_r($response);
