<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use Exception;
use GuzzleHttp\Exception\RequestException;

class Instagram extends HttpRequest
{

/**
 * Initializes the Instagram class with API configuration.
 *
 * Sets the API URL using the domain URL from the Instagram configuration and
 * initializes additional headers .
 */

   public function __construct()
   {
    
       $this->setApiUrl(config('instagram.api_url'));
       $this->additionalHeader = ['x-rapidapi-host' => config('instagram.x-rapidapi-host', ''), 'x-rapidapi-key' => config('instagram.x-rapidapi-key')];
      
  }



    /**
     * Search for a user by username
     *
     * @param string $search The username to search for
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */

  public function searchByUsername($username)
  {
      $this->setRequestOptions(); 
      
      try {
       $result =  $this->setHttpResponse("get_info", 'POST', ["username" => $username])->getResponse();

        return $result;
      } catch ( RequestException $e) {
        echo 'Request failed' . $e->getMessage();
      }
     catch (Exception $e) {
      echo 'Request failed' . $e->getMessage();
    }
  }




    /**
     * Extracts the user ID from the response.
     *
     * @param array $result The response from the API
     *
     * @return string|null The user ID, or null if the request fails
     *
     * @throws Exception If the user ID is not found in the response
     */

  private function getUserIdFromResponse($result)
  {
      // Check if the necessary keys exist in the response
      if (isset($result['response']['body']['data']['user']['id'])) {
          return $result['response']['body']['data']['user']['id'];
      } else {
          throw new Exception('User ID not found in the response.');
      }
  }


    /**
     * Search for a user by ID
     *
     * @param string $id The user ID to search for
     *
     * @return array|null The response from the API, or null if the request fails
     *
     * @throws RequestException|Exception If the request fails
     */

  public function searchByUserId($id)
  {

      $this->setRequestOptions();

      try {
        $result = $this->setHttpResponse('get_info_by_id', 'POST', ["id" => $id])->getResponse();
        
        return  $result;
      } catch ( RequestException $e) {
        echo 'Request failed' . $e->getMessage();
      }
      catch (Exception $e) {
        echo 'Request failed' . $e->getMessage();
      }

  }



}