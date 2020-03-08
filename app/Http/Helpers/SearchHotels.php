<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;

class SearchHotels
{
    protected $url;
    protected $http;
    protected $headers;

    public function __construct(Client $client)
    {
        $this->url = 'http://www.mocky.io/v2/5e400f423300005500b04d0c';
        $this->http = $client;
        $this->headers = [
            'cache-control' => 'no-cache',
            'content-type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function getResponse(string $uri = null)
    {
       $full_path = $uri;

        $request = $this->http->get($full_path, [
            'headers'         => $this->headers,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return (object) json_decode($response);
        }

        return null;
    }

    public function postResponse(string $uri = null, array $post_params = [])
    {
        $full_path = $uri;

        $request = $this->http->post($full_path, [
            'headers'         => $this->headers,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
            'form_params'     => $post_params,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return  (array)$response;
        }

        return null;
    }

}
