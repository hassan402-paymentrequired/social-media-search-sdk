<?php

namespace Eagleworld\Search;

use Eagleworld\Search\Abstracts\HttpRequest;
use GuzzleHttp\Client;

class Twitter extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('twitter.api_url', 'https://twitter241.p.rapidapi.com/user'));
        $this->additionalHeader = ['x-rapidapi-host' => config('twitter.x-rapidapi-host'), 'x-rapidapi-key' => config('twitter.x-rapidapi-key')];
    }

    public function search($search)
    {

        try {

            $this->setRequestOptions();
            return $this->setHttpResponse("?username={$search}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }
}
