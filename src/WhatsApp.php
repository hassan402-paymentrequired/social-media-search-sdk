<?php

namespace Eaglewatch\Search;

use Eaglewatch\Search\Abstracts\HttpRequest;
use GuzzleHttp\Exception\RequestException;

class WhatsApp extends HttpRequest
{

/**
 * Initializes the WhataApp class with API configuration.
 *
 * Sets the API URL using the domain URL from the WhatsApp configuration and
 * initializes additional headers .
 */


     public function  __construct()
     {

          $this->setApiUrl(config('whatsApp.api_url'));  

          $this->additionalHeader = [
              'x-rapidapi-host' => config('whatsApp.x-rapidapi-host', ''),
              'x-rapidapi-key'  => config('whatsApp.x-rapidapi-key')
          ];
      

     }



/**
 * Retrieves the user profile for a given phone number.
 *
 * to fetch the associated user profile.
 *
 *******/
    public function getUserProfileByNumber($number)
    {

      $url = config('whatsApp.profile') .$number;
      
        $this->setRequestOptions();

        try {
          $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

          return $result;

        }catch ( RequestException $e) {
          echo 'Request failed' . $e->getMessage();
        }

    }



    /**
     * Validates if a user exists for a given phone number.
     *
     * Sends a GET request to check if the specified phone number exists
     * in the system and returns the result.
     *
     * @param string $number The phone number to validate.
     * @return mixed The response from the API indicating if the number exists.
     */

    public function validateUserNumber($number) {

      $url = config('whatsApp.exists') .$number;

      $this->setRequestOptions();

      try {
        $result = $this->setHttpResponse( $url, 'GET', [])->getResponse();

        return $result;

      }catch ( RequestException $e) {
        echo 'Request failed' . $e->getMessage();
      }
    }



}