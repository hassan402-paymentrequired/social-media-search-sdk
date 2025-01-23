<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;

class LinkedIn extends HttpRequest
{
    public function __construct()
    {
        $this->setApiUrl(config('app.snapchat.domain_url'));
        $this->additionalHeader = [
            'x-rapidapi-host' => config('app.linkedin.x-rapidapi-host', ''),
            'x-rapidapi-key' => config('app.linkedin.x-rapidapi-key')
        ];
        $this->setRequestOptions();
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $geo
     * @param string $companyName
     * @param string $keywordSchool
     * @param string $keywords
     * @return mixed $response
     */
    public function searchUsers($firstname, $lastname, $geo, $company = '', $keywordSchool = '', $keywords = '')
    {
        try {
            return $this->setHttpResponse("/search-people?keywords={$keywords}&firstName={$firstname}&lastName={$lastname}&company={$company}&geo={$geo}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }


    /**
     * @param string $username
     * @param string poatedAt (2024-01-01 00:00)
     * @param strng $start -> use this param to get posts in next results page: 0 for page 1, 50 for page 2 100 for page 3, etc
     */
    public function searchUserProfileProfilePost($username, ?string  $poatedAt = '')
    {
        try {
            return $this->setHttpResponse("/get-profile-posts?username={$username}&postedAt={$poatedAt}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }


    /**
     * @param string $username
     * @return mixed
     */
    public function searchUserProfile($username)
    {
        try {
            return $this->setHttpResponse("/?username={$username}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function searchAboutUserProfile($username)
    {
        try {
            return $this->setHttpResponse("/?about-this-profile={$username}", 'GET', [])->getResponse();
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
}
