<?php


namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;

class SnapChat extends HttpRequest
{

    public function __construct()
    {
        $this->setApiUrl(config('app.snapchat.domain_url'));
        $this->additionalHeader = [
            'x-rapidapi-host' => config('app.snapchat.x-rapidapi-host', ''),
            'x-rapidapi-key' => config('app.snapchat.x-rapidapi-key')
        ];
        $this->setRequestOptions();
    }


    /**
     * @param string $username
     * @return mixed $response
     */
    public function searchUserProfile($username)
    {
        try {
            return $this->setHttpResponse("/getProfile?username={$username}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * @param string $username
     * @return mixed $response
     */
    public function searchUserLenses($username)
    {
        try {
            return $this->setHttpResponse("/getUserLenses?username={$username}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * @param string $username
     * @return mixed $response
     */
    public function searchUserStory($username)
    {
        try {
            return $this->setHttpResponse("/getUserStory?username={$username}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * @param string $username
     * @return mixed $response
     */
    public function searchUserSpotlightHighlights($username)
    {
        try {
            return $this->setHttpResponse("/getUserSpotlightHighlights?username={$username}", 'GET', [])->getResponse();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Request failed: ' . $e->getMessage();
        }
    }
}
