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
      
        $this->setRequestOptions();

        try {
          $result = $this->setHttpResponse(  $number, 'GET', [])->getResponse();

          return $result;

        }catch ( RequestException $e) {
          echo 'Request failed' . $e->getMessage();
        }

    }


    



}