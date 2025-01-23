<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;

class Tictok extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('tictok.domain_url'));
        $this->additionalHeader = ['x-rapidapi-host' => config('tictok.x-rapidapi-host'), 'x-rapidapi-key' => config('tictok.x-rapidapi-key')];
        $this->setRequestOptions();

    }

    /**
     * @param count 
     * @param count 
     * @param count 
     */
    public function userFollowersSearch($secId = "MS4wLjABAAAATHgwgKNzyritNRv9Zw4K9whlT48MvXYlXaN_ByOwnbTZk5ZuqmolZ2Wx5XqhARya")
    {
        try {
            return $this->setHttpResponse("followers?secUid={$secId}&count=50&minCursor=0&maxCursor=0", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    public function userNameSearch($search)
    {
        try {
            return $this->setHttpResponse("info?uniqueId={$search}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    public function userIdSearch($userID)
    {
        try {
            return $this->setHttpResponse("info-by-id?userId={$userID}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    public function userFolloweringsSearch(string $search)
    {
        try {
            return $this->setHttpResponse("followings?secUid=MS4wLjABAAAAY3pcRUgWNZAUWlErRzIyrWoc1cMUIdws4KMQQAS5aKN9AD1lcmx5IvCXMUJrP2dB&count=50&minCursor=0&maxCursor=0", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string secUid
     * @param int cursor
     * @param int count
     * @return mixed
     * 
     */
    public function userPostSearch(string $secUid)
    {
        try {
            return $this->setHttpResponse("posts?secUid=MS4wLjABAAAAqB08cUbXaDWqbD6MCga2RbGTuhfO2EsHayBYx08NDrN7IE3jQuRDNNN6YwyfH6_6&count=35&cursor=0", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * @param string secUid
     * @param int cursor
     * @param int count
     * @return mixed
     * 
     */
    public function userRepostSearch(string $secUid)
    {
        try {
            return $this->setHttpResponse("repost?secUid=MS4wLjABAAAA-hnFaH9aGUYLRspPmUXT3nZOha3-CEyChdtqwlyFaG1M_kAi4MD0AaZkbuIsPIzc&count=30&cursor=0", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string secUid
     * @param int count
     * @return mixed
     * 
     */
    public function userPopularPostostSearch(string $secUid)
    {
        try {
            return $this->setHttpResponse("popular-posts?secUid={$secUid}&count=35", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }



    /**
     * @param string secUid
     * @param int cursor
     * @param int count
     * @return mixed
     * 
     */
    public function userOldestPostostSearch(string $secUid)
    {
        try {
            return $this->setHttpResponse("oldest-posts?secUid={$secUid}&count=30", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }
}
