<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;

class Twitter extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('app.twitter.api_url', 'https://twitter241.p.rapidapi.com/user'));
        $this->additionalHeader = ['x-rapidapi-host' => config('app.twitter.x-rapidapi-host'), 'x-rapidapi-key' => config('app.twitter.x-rapidapi-key')];
        $this->setRequestOptions();
    }

    /**
     * return the user with the username
     * @param string $username
     * @return array|mixed
     */
    public function search($username)
    {
        try {
            return $this->setHttpResponse("?username={$username}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
}
