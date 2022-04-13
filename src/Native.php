<?php

namespace ChernKiat\Moralis;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Native
{
    private $key;
    private $client;

    public function __construct(string $key = null) {
        $this->key     = $key ?? config('moralis.key');
        $this->client  = new Client([
            'base_uri' => 'https://deep-index.moralis.io/api/v2'
        ]);
    }

    public function event(string $name, float $val)
    {
        try {
            $res = $this->client->request('POST', '/json', [
                'json'     => [
                    'name' => $name,
                    'value' => $val
                ],
                'headers'  => [
                    'x-qm-key' => $this->key
                ]
            ]);

            return response()->json([
                'code'     => $res->getStatusCode(),
                'message'  => $res->getReasonPhrase()
            ]);
        } catch(GuzzleException $e) {
            // handle the exception
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function batch(array $items) {
        try {
            $res = $this->client->request('POST', '/list', [
                'json'     => $items,
                'headers'  => [
                    'accept'        => 'application/json',
                    'X-API-KEY'     => $this->key,
                    'Content-Type'  => 'application/json',
                ]
            ]);

            return response()->json([
                'code'     => $res->getStatusCode(),
                'message'  => $res->getReasonPhrase()
            ]);
        } catch(GuzzleException $e) {
            // handle the exception
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
