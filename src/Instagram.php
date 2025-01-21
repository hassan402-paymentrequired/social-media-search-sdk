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
   * initializes additional headers.
   */
  public function __construct()
  {
      $this->setApiUrl(config('instagram.api_url'));
      $this->additionalHeader = [
          'x-rapidapi-host' => config('instagram.x-rapidapi-host', ''),
          'x-rapidapi-key' => config('instagram.x-rapidapi-key')
      ];

      $this->setRequestOptions(); 

  }

  /**
   * Search for a user by username
   *
   * @param string $username The username to search for
   *
   * @return array|null The response from the API, or null if the request fails
   *
   * @throws RequestException|Exception If the request fails
   */
  public function getUserByUsername($username)
  {
    
      
      try {
          $result = $this->setHttpResponse(config('instagram.user_info_endpoint'),'POST', ["username" => $username])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
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
  public function getUserById($id)
  {

      try {
          $result = $this->setHttpResponse(config("instagram.user_info_by_id_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }

  /**
   * Get the tags associated with a user by their ID
   *
   * @param string $id The user ID
   *
   * @return array|null The response from the API, or null if the request fails
   */
  public function getUserTagsById($id)
  {

      try {
          $result = $this->setHttpResponse(config("instagram.user_tags_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }

  /**
   * Get the media for a user by their ID
   *
   * @param string $id The user ID
   *
   * @return array|null The response from the API, or null if the request fails
   */
  public function getUserMediaInfoById($id)
  {

      try {
          $result = $this->setHttpResponse(config("instagram.user_media_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }




        /**
     * Get similar accounts for a user by their ID
     *
     * @param string $id The user ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getUserSimilarAccountsById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.user_similar_accounts_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    

    /**
     * Get the user's followers by ID
     *
     * @param string $id The user ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getUserFollowersById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.user_followers_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * Get the user's following by ID
     *
     * @param string $id The user ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getUserFollowingById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.user_following_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * Get the user's stories by ID
     *
     * @param string $id The user ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getUserStoriesByIds($ids)
    {

            
       if (!is_array($ids)) {
              throw new Exception("The 'ids' field must be an array.");
          }

        try {
            $result = $this->setHttpResponse(config("instagram.user_stories_endpoint"), 'POST', ["ids" => $ids])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


    /**
     * Get guide info by guide ID
     *
     * @param string $guideId The guide ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getUserGuidesById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.user_guides_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


/**
 * Get highlight info by highlight ID
 *
 * @param string $highlightId The highlight ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getUserHighlightsById($id)
  {

      try {
          $result = $this->setHttpResponse(config("instagram.user_highlights_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }



/**
 * Get clip info by clip ID
 *
 * @param string $clipId The clip ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getUserClipsById($id)
  {

      try {
          $result = $this->setHttpResponse(config("instagram.user_clips_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }


/**
 * Get live info by ID
 *
 * @param string $id The live ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
    public function getUserLiveById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.user_live_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
 * Search for user by query
 *
 * @param string $query The search query
 *
 * @return array|null The response from the API, or null if the request fails
 */
    public function searchUserByQuery($query)
    {

        try {
            // Assuming there's a specific endpoint for user search
            $result = $this->setHttpResponse(config("instagram.user_search_endpoint"), 'POST', ["query" => $query])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }




        /**
     * Get media info by ID
     *
     * @param string $id The media ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
      public function getMediaInfoById($id)
      {

          try {
              $result = $this->setHttpResponse(config("instagram.media_info_endpoint"), 'POST', ["id" => $id])->getResponse();
              return $result;
          } catch (RequestException $e) {
              echo 'Request failed: ' . $e->getMessage();
          }
      }



        /**
     * Get media info by shortcode
     *
     * @param string $shortcode The media shortcode
     *
     * @return array|null The response from the API, or null if the request fails
     */

      public function getMediaInfoByShortcode($shortcode)
      {

          try {
              $result = $this->setHttpResponse(config("instagram.media_info_by_shortcode_endpoint"), 'POST', ["shortcode" => $shortcode])->getResponse();
              return $result;
          } catch (RequestException $e) {
              echo 'Request failed: ' . $e->getMessage();
          }
      }

    /**
     * Get media likes by media ID
     *
     * @param string $mediaId The media ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
      public function getMediaLikesByShortcode($shortcode)
      {

          try {
              $result = $this->setHttpResponse(config("instagram.media_likes_by_shortcode_endpoint"), 'POST', ["shortcode" => $shortcode])->getResponse();
              return $result;
          } catch (RequestException $e) {
              echo 'Request failed: ' . $e->getMessage();
          }
      }

    /**
     * Get media comments by media ID
     *
     * @param string $mediaId The media ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
      public function getMediaCommentsBySId($Id)
      {

          try {
              $result = $this->setHttpResponse(config("instagram.media_comments_by_id_endpoint"), 'POST', ["id" => $Id])->getResponse();
              return $result;
          } catch (RequestException $e) {
              echo 'Request failed: ' . $e->getMessage();
          }
      }


       /**
 * Get media shortcode by media ID
 *
 * @param string $mediaId The media ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getMediaShortcodeById($id)
  {

      try {
          // Assuming there's a specific endpoint to get media shortcode by ID
          $result = $this->setHttpResponse(config("instagram.media_shortcode_by_id_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }



  /**
 * Get media ID by media shortcode
 *
 * @param string $shortcode The media shortcode
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getMediaIdByShortcode($shortcode)
  {

      try {
          // Assuming there's a specific endpoint to get media ID by shortcode
          $result = $this->setHttpResponse(config("instagram.media_id_by_shortcode_endpoint"), 'POST', ["shortcode" => $shortcode])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }






    /**
     * Get location info by location ID
     *
     * @param string $locationId The location ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getLocationInfoById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.location_info_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }

    /**
     * Get location media by location ID
     *
     * @param string $locationId The location ID
     *
     * @return array|null The response from the API, or null if the request fails
     */
    public function getLocationMediaById($id)
    {

        try {
            $result = $this->setHttpResponse(config("instagram.location_media_endpoint"), 'POST', ["id" => $id])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }


/**
 * Search by location
 *
 * @param string $query The location query (e.g., "New York")
 *
 * @return array|null The response from the API, or null if the request fails
 */
    public function searchLocationByQuery($query)
    {

        try {
            // Assuming there's a specific endpoint for searching by location
            $result = $this->setHttpResponse(config("instagram.location_search_endpoint"), 'POST', ["query" => $query])->getResponse();
            return $result;
        } catch (RequestException $e) {
            echo 'Request failed: ' . $e->getMessage();
        }
    }




    
    /**
 * Get hashtag info by hashtag
 *
 * @param string $hashtag The hashtag to search for
 *
 * @return array|null The response from the API, or null if the request fails
  */
  public function getHashtagInfoByHashtag($hashtag)
  {

      try {
   
          $result = $this->setHttpResponse(config("instagram.hashtag_info_endpoint"), 'POST', ["name" => $hashtag])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }


  
  public function getHashtagMediaByHashtag($hashtag)
  {

      try {
          
          $result = $this->setHttpResponse(config("instagram.hashtag_media_endpoint"), 'POST', ["name" => $hashtag])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }



  
  /**
 * Search for audio  by query
 *
 * @param string $query The search query 
 *
 * @return array|null The response from the API, or null if the request fails
  */
  public function searchHashtagByQuery($query)
  {

      try {
          
          $result = $this->setHttpResponse(config("instagram.hashtag_search_endpoint"), 'POST', ["query" => $query])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }






  /**
 * Get highlight stories by highlight IDs
 *
 * @param array $ids The highlight IDs
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getHighlightStoriesByIds($ids)
  {

      if (!is_array($ids)) {
          throw new Exception("The 'ids' field must be an array.");
      }

      try {
          // Assuming there's a specific endpoint for fetching highlight stories by highlight IDs
          $result = $this->setHttpResponse(config("instagram.highlight_stories_endpoint"), 'POST', ["ids" => $ids])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }


  /**
 * Get comment likes by comment ID
 *
 * @param string $id The comment ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getCommentLikesById($id)
  {

      try {
          // Assuming there's a specific endpoint for fetching comment likes by comment ID
          $result = $this->setHttpResponse(config("instagram.comment_likes_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }


  /**
 * Get audio media by media ID
 *
 * @param string $id The media ID
 *
 * @return array|null The response from the API, or null if the request fails
 */
  public function getAudioMediaById($id)
  {

      try {
          // Assuming there's a specific endpoint for fetching audio media by media ID
          $result = $this->setHttpResponse(config("instagram.audio_media_endpoint"), 'POST', ["id" => $id])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }



  /**
 * Search for audio  by query
 *
 * @param string $query The search query 
 *
 * @return array|null The response from the API, or null if the request fails
  */
  public function searchAudiosByQuery($query)
  {

      try {
      
          $result = $this->setHttpResponse(config("instagram.audio_search_endpoint"), 'POST', ["query" => $query])->getResponse();
          return $result;
      } catch (RequestException $e) {
          echo 'Request failed: ' . $e->getMessage();
      }
  }




}
