<?php

use Eaglewatch\Search\Facebook;
use Eaglewatch\Search\Tictok;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Tictok())->userFollowersSearch();

print_r($response);
