<?php

use Eaglewatch\Search\Facebook;
use Eaglewatch\Search\LinkedIn;
use Eaglewatch\Search\SnapChat;
use Eaglewatch\Search\Thread;
use Eaglewatch\Search\Tictok;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new LinkedIn())->searchUsers('hassan');

print_r($response);
