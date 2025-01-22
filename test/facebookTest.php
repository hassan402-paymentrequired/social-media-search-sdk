<?php

use Eaglewatch\Search\Facebook;
use Eaglewatch\Search\SnapChat;
use Eaglewatch\Search\Thread;
use Eaglewatch\Search\Tictok;

require_once __DIR__ . '/../vendor/autoload.php';

$response = (new SnapChat())->searchUserLenses('lateefhassa9035');

print_r($response);
