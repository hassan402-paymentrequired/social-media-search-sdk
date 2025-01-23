<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;

class Thread extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('app.thread.domain_url'));
        $this->additionalHeader = ['x-rapidapi-host' => config('app.thread.x-rapidapi-host'), 'x-rapidapi-key' => config('app.thread.x-rapidapi-key')];
        $this->setRequestOptions();
    }

    /**
     * @param string username
     * @return mixed 
     * 
     */
    public function userDetailsSearch(string $username)
    {
        try {
            return $this->setHttpResponse("detail?username={$username}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }


    /**
     * @param string userName
     * @return mixed
     * search all the users associated with that name
     */
    public function userNameSearch(string $username)
    {
        try {
            return $this->setHttpResponse("search?query={$username}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
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
            return $this->setHttpResponse("posts?username={$userName}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
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
            return $this->setHttpResponse("detail-with-biolink?username={$userName}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
}
