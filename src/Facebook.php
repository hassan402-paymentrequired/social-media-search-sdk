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
            $response = $this->client->request('GET', 'https://facebook-scraper3.p.rapidapi.com/search/posts', [
                'query' => ['query' => $query], // The query parameter (search term)
                'headers' => [
                    'x-rapidapi-host' => 'app.facebook-scraper3.p.rapidapi.com',
                    'x-rapidapi-key' => 'a6f480bfa8msh5da5b8344d4c919p1a03dfjsn11c4d160c1cf', // Your RapidAPI key
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
}
