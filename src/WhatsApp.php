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
        $this->setRequestOptions();

      

     }



/**
 * Retrieves the user profile for a given phone number.
 *
 * to fetch the associated user profile.
 *
 *******/
    public function getUserProfileByNumber($number)
    {


      $url = config('WhatsApp.user_profile_endpoint') .$number;


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


      $url = config('whatsApp.user_exists_endpoint') .$number;


      try {
        $result = $this->setHttpResponse( $url, 'GET', [])->getResponse();

        return $result;

      }catch ( RequestException $e) {
        echo 'Request failed' . $e->getMessage();
      }
    }





    /**
     * Downloads the profile picture for a given phone number.
     *
     * Sends a GET request to retrieve the profile picture associated with the specified phone number.
     *
     * @param string $number The phone number whose profile picture you want to download.
     * @param string $savePath The file path where the image will be saved.
     * @return bool Returns true if the profile picture was successfully downloaded, false otherwise.
     */
    public function downloadProfilePicture($number) 
    {
    
        // URL for fetching the profile picture (assuming API provides it)
        $url = config('whatsApp.user_profile_picture_endpoint') . $number; 
    
        // Set request options
    
        try {
          $result = $this->setHttpResponse( $url, 'GET', [])->getResponse();
  
          return $result;
  
        }catch ( RequestException $e) {
          echo 'Request failed' . $e->getMessage();
          return false;
        }   
     }



/**
 * Deletes all messages for a given phone number.
 *
 * Sends a DELETE request to remove all messages associated with the specified phone number.
 *
 * @param string $number The phone number whose messages you want to delete.
 * @return mixed The response from the API after attempting to delete the messages, or false if the request failed.
 */
  public function deleteAllMessages()
  {
      $url = config('whatsApp.messages_endpoint') ;
      

      try {
          // Send DELETE request
          $result = $this->setHttpResponse($url, 'DELETE', [])->getResponse();

          return $result;

      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
          return false;
      }
  }

    
    


    /**
     * Sends a message to a specified phone number.
     *
     * Sends a POST request to send a message to the given phone number
     * via the specified API.
     *
     * @param string $number The phone number to send the message to.
     * @param string $message The message content to be sent.
     * @return mixed The response from the API indicating the success or failure of the message sending.
     */
    public function sendMessage($number, $message)
    
    {
      $url = config('whatsApp.send_messages_endpoint');

       

      try {
        $result = $this->setHttpResponse( $url, 'POST', 
        [
          [
            'to' => $number,
            'content' => [
                'type' => 'text',
                'body' => $message,
                'isPreviewUrl' => false
            ]
          ]
        ])->getResponse();

        return $result;

      }catch ( RequestException $e) {
        echo 'Request failed' . $e->getMessage();
      }
    }



/**
 * Retrieves the QR code for OTP session.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file 
 * to fetch the QR code that is associated with the current OTP session.
 * It returns the response containing the QR code data.
 *
 * @return mixed The response containing the QR code data or an error message in case of failure.
 */
  public function getQrcode()
  {

      $url = config('WhatsApp.sessions_show-qr_endpoint');


      try {
          $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

      
          return $result;

      } catch (RequestException $e) {
      
          echo 'Request failed' . $e->getMessage();
      }
  }



/**
 * Retrieves all OTP sessions.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file 
 * to fetch all active OTP sessions. It returns the response with session data.
 *
 * @return mixed The response containing session data or an error message in case of failure.
 */
    public function getAllOtpSessions()
    {

        $url = config('WhatsApp.sessions_endpoint');


        try {

            $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

            return $result;

        } catch (RequestException $e) {
            echo 'Request failed' . $e->getMessage();
        }
    }


/**
 * Deletes the OTP session data.
 *
 * This function sends a DELETE request to the API endpoint specified in the configuration file
 * to remove the active OTP session. It returns the response indicating the result of the deletion 
 * or an error message if the request fails.
 *
 * @return mixed The response indicating the result of the OTP session deletion, or false if the request fails.
 */
  public function deleteOtpSession()
  {
      $url = config('WhatsApp.sessions_otp_endpoint');

      try {
          $result = $this->setHttpResponse($url, 'DELETE', [])->getResponse();
          return $result;

      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      
      }
  }

        
     

  /**
 * Initializes an OTP session.
 *
 * This function sends a POST request to the API endpoint to start a new OTP session.
 * It provides the necessary data in the request body (e.g., the session name) 
 * and returns the response from the API.
 *
 * @return mixed The response from the API or false in case of failure.
 */
  public function initOtpSession($name)
  {
    
      $url = config('WhatsApp.sessions_init_endpoint');
      
    

      try {
        $result = $this->setHttpResponse($url, 'POST', ['name' => $name])->getResponse();
        return $result;

    } catch (RequestException $e) {
        echo 'Request failed: ' . $e->getMessage();
      
    }
  }






  /**
 * Retrieves all events.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file
 * to fetch all events. It returns the response with event data.
 *
 * @return mixed The response containing event data or an error message in case of failure.
 */
public function getAllEvents()
{
    
    $url = config('WhatsApp.events_endpoint'); 


    try {

        $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

        return $result;

    } catch (RequestException $e) {
        echo 'Request failed: ' . $e->getMessage();
        return false;
    }
}



/**
 * Retrieves a single event.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file
 * to fetch a specific event by its identifier. It returns the response with the event data.
 *
 * @param string $eventId The unique identifier for the event you want to retrieve.
 * @return mixed The response containing event data or an error message in case of failure.
 */
  public function getEvent($eventId)
  {
     
      $url = config('WhatsApp.events_endpoint') .$eventId;


      try {

          
          $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

          return $result;

      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
          return false;
      }
  }


/**
 * Retrieves a single event and triggers a retry.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file
 * to fetch a specific event by its identifier and attempt a retry action. It returns the response with the event data or an error message.
 *
 * @param string $eventId The unique identifier for the event you want to retrieve and retry.
 * @return mixed The response containing event data or an error message in case of failure.
 */
public function getEventRetry($eventId)
{
    
    $url = config('WhatsApp.events_endpoint') . $eventId . '/retry';

   

    try {
       
        $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

        return $result;

    } catch (RequestException $e) {
        
        echo 'Request failed: ' . $e->getMessage();
        return false;
    }
}





/**
 * Retrieves all webhooks.
 *
 * This function sends a GET request to the API endpoint specified in the configuration file
 * to fetch all webhooks. It returns the response with webhook data.
 *
 * @return mixed The response containing webhook data or an error message in case of failure.
 */
  public function getAllWebhooks()
  {
      $url = config('WhatsApp.webhooks_endpoint');  // Assuming you have a webhook endpoint in your config


      try {
          // Send a GET request to fetch the webhooks
          $result = $this->setHttpResponse($url, 'GET', [])->getResponse();

          return $result;

      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
          return false;
      }
  }



  // public function setWebhooks()
  // {
    
  // }


// public function updateWebhooks()
  // {
    
  // }



  
// public function deleteWebhooks()
  // {
    
  // }

}