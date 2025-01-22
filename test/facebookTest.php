<?php

use Eaglewatch\Search\Facebook;
use Eaglewatch\Search\Thread;
use Eaglewatch\Search\Tictok;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Thread())->userNameSearch('hassan');

print_r($response);
