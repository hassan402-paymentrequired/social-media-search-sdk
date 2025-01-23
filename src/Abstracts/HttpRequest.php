<?php

namespace Eaglewatch\Search\Abstracts;

use Exception;
use GuzzleHttp\Client;


abstract class HttpRequest
{
    protected string $baseUrl, $apiKey;
    protected $client;
    protected $response;
    protected array $additionalHeader = [];

    protected function setApiUrl($apiBaseUrl): void
    {
        $this->baseUrl = $apiBaseUrl;
    }

    protected function setApiKey($key): void
    {
        $this->apiKey = $key;
    }

    protected function setRequestOptions()
    {
        $headers = [
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            ...$this->additionalHeader
        ];
        $this->client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'headers' => $headers
            ]
        );
    }

    protected function setHttpResponse($relativeUrl, $method, $body = [])
    {
        if (is_null($method)) {
            throw new Exception("Request method must be specified");
        }

        $this->response = $this->client->{strtolower($method)}(
            $this->baseUrl . $relativeUrl,
            ["body" => json_encode($body)]
        );
        return $this;
    }

    protected function getResponse()
    {
        $data = json_decode($this->response->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Failed to decode JSON: " . json_last_error_msg());
        }
        return $data;
    }

    protected function getFileContent($url)
    {
        $jsonData = @file_get_contents($url);
        if ($jsonData === FALSE) {
            throw new Exception("Unable to fetch data from $url");
        }

        $data = json_decode($jsonData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Failed to decode JSON: " . json_last_error_msg());
        }

        return $data;
    }
}
