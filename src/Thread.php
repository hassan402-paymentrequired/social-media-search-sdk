<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;

class Thread extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('thread.domain_url'));
        $this->additionalHeader = ['x-rapidapi-host' => config('thread.x-rapidapi-host'), 'x-rapidapi-key' => config('thread.x-rapidapi-key')];
    }

    /**
     * @param string username
     * @return mixed 
     * 
     */
    public function userDetailsSearch(string $userName)
    {
        try {
            $this->setRequestOptions();
            return $this->setHttpResponse("detail?username=jlo", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }catch(Exception $e){
             echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string userName
     * @return mixed
     * search all the users associated with that name
     */
    public function userNameSearch(string $userName)
    {
        try {
            $this->setRequestOptions();
            return $this->setHttpResponse("search?query=jlo", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * @param string userName
     * @return mixed
     * search a post related to a particular user
     * 
     */
    public function userPostSearch(string $userName)
    {
        try {
            $this->setRequestOptions();
            return $this->setHttpResponse("posts?username={$userName}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string userName
     * @return mixed
     * search for a user and return thier bio link
     * 
     */
    public function userDetailsWithBioLink(string $userName)
    {
        try {
            $this->setRequestOptions();
            return $this->setHttpResponse("detail-with-biolink?username={$userName}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }
}
