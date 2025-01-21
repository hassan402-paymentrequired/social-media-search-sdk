<?php

use Eaglewatch\Search\Facebook;
use Eaglewatch\Search\Thread;
use Eaglewatch\Search\Tictok;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new Facebook())->getPageDetailsByUrl('https%3A%2F%2Fwww.facebook.com%2Fevents%2F456725590572335');

print_r($response);
