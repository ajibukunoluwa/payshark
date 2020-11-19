<?php

namespace Ibk\Paystack\Supports;

class Request
{

    /**
     * Base URL
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Request Headers
     *
     * @var array
     */
    protected $headers;

    /**
     * Request Response
     *
     * @var object
     */
    protected $response;

    /**
     * Request Response as an array
     *
     * @var bool
     */
    protected $asArray = true;

    /**
     * Request Response as a Json
     *
     * @var bool
     */
    protected $asJson = false;


    public function __construct($baseUrl = "")
    {
        if (empty($baseUrl)) {
            $this->client   = new \GuzzleHttp\Client();
        } else {
            $this->client   = new \GuzzleHttp\Client([
                'base_uri' => $baseUrl,
            ]);
        }
    }

    /**
     * Make GET request using the client set in the construct
     *
     * @param string $url    URL to make GET request to
     *
     * @return Request
     */
    public function get($url)
    {
        $this->response = $this->client->request('Get', $url, [
            'headers' => $this->headers,
        ]);

        return $this;
    }

    /**
     * Make Post request using the client set in the construct
     *
     * @param string $url    URL to make POST request to
     *
     * @param array $params  Form options
     *
     * @return Request
     */
    public function post($url, array $params)
    {
        $this->response = $this->client->request('POST', $url, [
            'form_params' => $params,
            'headers' => $this->headers,
        ]);

        return $this;
    }

    /**
     * Make Put request using the client set in the construct
     *
     * @param string $url    URL to make PUT request to
     *
     * @param array $params  Form options
     *
     * @return Request
     */
    public function put($url, array $params)
    {
        $this->response = $this->client->request('PUT', $url, [
            'form_params' => $params,
            'headers' => $this->headers,
        ]);

        return $this;
    }

    /**
     * Make delete request using the client set in the construct
     *
     * @param string $url    URL to make DELETE request to
     *
     * @param array $params  Form options
     *
     * @return Request
     */
    public function delete($url)
    {
        $this->response = $this->client->request('DELETE', $url, [
            'headers' => $this->headers,
        ]);

        return $this;
    }

    /**
     * Set headers for request
     *
     * @param array $params  Request Headers
     *
     * @return void
     */
    public function setHeaders(array $headers)
    {
        $this->headers = array_merge([
            'Accept'     => 'application/json',
        ], $headers);
    }


    /**
     * Set response to be returned as an array
     *
     * @return Request
     */
    public function asArray()
    {
        $this->asArray  = true;
        $this->asJson   = false;

        return $this;
    }

    /**
     * Set response to be returned as in json format
     *
     * @return Request
     */
    public function asJson()
    {
        $this->asArray  = false;
        $this->asJson   = true;

        return $this;
    }

    /**
     * Returns Guzzle Response
     *
     * @return any
     */
    public function getResponse()
    {
        if ($this->asArray) {
            return $this->responseToArray();
        }

        return $this->responseToJson();
    }

    /**
     * Convert request response to array
     *
     * @return array
     */
    private function responseToArray() : array
    {
        return json_decode(
            $this->response->getBody()->getContents(),
            true
        );
    }

    /**
     * Convert request response to string
     *
     * @return string
     */
    private function responseToJson() : string
    {
        return $this->response->getBody()->getContents();
    }

}
