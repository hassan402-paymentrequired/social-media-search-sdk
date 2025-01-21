<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;
use GuzzleHttp\Exception\RequestException;

class Facebook extends HttpRequest
{
    /**
     * Initializes the FacebookScraper class with API configuration.
     *
     * Sets the API URL using the domain URL from the Facebook Scraper configuration
     * and initializes additional headers.
     */
    public function __construct()
    {
        $this->setApiUrl(config('facebook.api_url'));
        $this->additionalHeader = [
            'x-rapidapi-host' => config('facebook.x-rapidapi-host', ''),
            'x-rapidapi-key' => config('facebook.x-rapidapi-key')
        ];
        $this->setRequestOptions();

    }






     /**
     * Get profile details by profile ID
     *
     * @param string $profileId The profile ID to fetch details for
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getProfileDetailsById($profileId)
    {

        $url = config('facebook.profile_details_id') .'?profile_id=' . $profileId;
    
        try {
            $result = $this->setHttpResponse($url, 'GET', [])->getResponse();
    
        return $result;
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }





    /**
     * Get share count for a post by post ID
     *
     * @param string $postId The post ID to fetch share count for
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getPostShareCount($postId)
    {

        $url = config('facebook.post_share') .'?post_id=' . $postId;


        try {
            $result = $this->setHttpResponse($url, 'GET', [])->getResponse();
    
            
    
            return $result;
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }


    }



    /**
     * Get post details by post ID
     *
     * @param string $postId The post ID to fetch details for
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getPostDetailsById($postId)
    {
        
        $url = config('facebook.post_details') .'?post_id=' . $postId;



        try {
            $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

    
            return $result;
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }

    }

     /**
     * Get Facebook page details by URL
     *
     * @param string $url The URL of the Facebook page
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getPageDetailsByUrl($detailsurl)
    {

        $url = config('facebook.page_details') .'?url=' . $detailsurl;


        try {
            $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

    
            return $result;
        } catch (Exception $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * Get the reels from a Facebook page
     *
     * @param string $pageId The ID of the Facebook page
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getPageReels($pageId)
    {
        try {
            // Make the GET request to the Facebook Scraper API for page reels
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/page/reels', [
                'query' => [
                    'page_id' => $pageId, // The Facebook page ID
                ],
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // RapidAPI key
                ]
            ]);

            // Return the decoded response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle request errors
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
        
    }




    /**
     * Get the future events from a Facebook page
     *
     * @param string $pageId The ID of the Facebook page
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */
    public function getFuturePageEvents($pageId)
    {
        try {
            // Send the GET request to the Facebook Scraper API to get future events
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/page/events/future', [
                'query' => [
                    'page_id' => $pageId, // The Facebook page ID
                ],
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // RapidAPI key
                ]
            ]);

            // Decode the response body to return as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle the error if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }


    /**
     * Search for locations on Facebook using the API.
     *
     * @param string $query The search query for locations.
     *
     * @return array|null The response from the API, or null if the request fails.
     *
     * @throws RequestException|Exception If the request fails.
     */
    public function searchLocations($query)
    {
        try {
            // Send the GET request to the Facebook Scraper API to search locations
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/locations', [
                'query' => [
                    'query' => $query, // The search query parameter
                ],
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // RapidAPI key
                ]
            ]);

            // Decode and return the response body
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle the error if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    /**
     * Search for Facebook videos using the given query.
     *
     * @param string $query The search query (e.g., 'facebook').
     *
     * @return array|null The API response, or null if the request fails.
     *
     * @throws RequestException|Exception If the request fails.
     */
    public function searchVideos($query)
    {
        try {
            // Send the GET request to the API
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/videos', [
                'query' => ['query' => $query], // The query parameter (search term)
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Return the response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    /**
     * Search for posts containing the given query.
     *
     * @param string $query The search query (e.g., 'facebook').
     *
     * @return array|null The API response, or null if the request fails.
     *
     * @throws RequestException|Exception If the request fails.
     */
    public function searchPosts($query)
    {
        try {
            // Send the GET request to the API
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/posts', [
                'query' => ['query' => $query], // The query parameter (search term)
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Return the response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    /**
     * Search for places containing the given query (e.g., 'pizza').
     *
     * @param string $query The search query (e.g., 'pizza').
     *
     * @return array|null The API response, or null if the request fails.
     *
     * @throws RequestException|Exception If the request fails.
     */
    public function searchPlaces($query)
    {
        try {
            // Send the GET request to the API
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/places', [
                'query' => ['query' => $query], // Search query (e.g., 'pizza')
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Return the response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    // **
    //  * Search for pages related to the given query (e.g., 'beer').
    //  *
    //  * @param string $query The search query (e.g., 'beer').
    //  *
    //  * @return array|null The API response, or null if the request fails.
    //  *
    //  * @throws RequestException|Exception If the request fails.
    //  */
    //
     public function searchPages($query)
    {
        try {
            // Send the GET request to the API
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/pages', [
                'query' => ['query' => $query], // Search query (e.g., 'beer')
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Return the response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    /**
     * Search for events related to the given query (e.g., 'beer').
     *
     * @param string $query The search query (e.g., 'beer').
     *
     * @return array|null The API response, or null if the request fails.
     *
     * @throws RequestException|Exception If the request fails.
     */
    public function searchEvents($query)
    {
        try {
            // Send the GET request to the API
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/events', [
                'query' => ['query' => $query], // Search query (e.g., 'beer')
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Return the response body as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }




    /**
     * Retrieve posts from a specific Facebook group.
     *
     * @param string $groupId The Facebook group ID (e.g., '1439220986320043').
     * @return array|null The response containing group posts or null if the request fails.
     * @throws RequestException|Exception If the request fails.
     */
    public function getGroupPosts($groupId)
    {
        try {
            // Send the GET request to the Facebook Scraper API to retrieve group posts
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/group/posts', [
                'query' => ['group_id' => $groupId], // Pass group ID as a query parameter
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Decode and return the response body as an associative array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



    /**
     * Get details of a Facebook group using its URL.
     *
     * @param string $groupUrl The URL of the Facebook group.
     * @return array|null The response containing group details or null if request fails.
     * @throws RequestException|Exception If the request fails.
     */
    public function getGroupDetails($groupUrl)
    {
        try {
            // Send the GET request to the Facebook Scraper API to retrieve group details
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/group/details', [
                'query' => ['url' => $groupUrl], // Pass group URL as a query parameter
                'headers' => [
                    'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);

            // Decode and return the response body as an associative array
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle errors if the request fails
            echo 'Request failed: ' . $e->getMessage();
            return null;
        }
    }



//     **
//  * Get the group ID of a Facebook group using its URL.
//  *
//  * @param string $groupUrl The URL of the Facebook group.
//  * @return string|null The group ID if request is successful, or null if request fails.
//  * @throws RequestException|Exception If the request fails.
//  */
public function getGroupIdByUrl($groupUrl)
{
    try {
        // URL encode the group URL for safe transmission
        $encodedUrl = urlencode($groupUrl);

        // Send the GET request to the Facebook Scraper API to retrieve group ID
        $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/group/id', [
            'query' => ['url' => $encodedUrl], // Pass group URL as a query parameter
            'headers' => [
                'x-rapidapi-host' => 'facebook-scraper3.p.rapidapi.com',
                'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
            ],
        ]);

        // Decode the response and check if 'id' exists in the response data
        $responseData = json_decode($response->getBody()->getContents(), true);
        
        // Return the group ID if found
        return isset($responseData['id']) ? $responseData['id'] : null;
    } catch (RequestException $e) {
        // Handle errors if the request fails
        echo 'Request failed: ' . $e->getMessage();
        return null;
    }




   
    
}

}