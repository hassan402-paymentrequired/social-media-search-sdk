<?php

namespace Eaglewatch\Search;

use Exception;
use Eaglewatch\Search\Abstracts\HttpRequest;

class Twitter extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('twitter.rapidapi_domain_url'));
        $this->additionalHeader = ['x-rapidapi-host' => config('twitter.x-rapidapi-host'), 'x-rapidapi-key' => config('twitter.x-rapidapi-key')];
    }

    /**
     * @param string $username
     * @return array
     */
    public function userNameSearch(string $search)
    {
        try {

            $this->setRequestOptions();
            return $this->setHttpResponse("user?username={$search}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * @param string $userId
     * @param int $count
     * @return array
     */
    public function userTweetSearch(?string $userId, ?int $count = 10)
    {
        try {

            $this->setRequestOptions();

            return  $this->setHttpResponse("user-tweets?user={$userId}&count={$count}", "GET", [])->getResponse();
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string $userId
     * @param int $count
     * @return array
     * 
     */
    public function userRepliesSearch(?string $userId = "2455740283", ?int $count = 10)
    {
        try {
            $this->setRequestOptions();
            return  $this->setHttpResponse("user-replies?user={$userId}&count={$count}", "GET", [])->getResponse();
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }
}
