<?php

namespace ChernKiat\Moralis;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Storage
{
    private $key;
    private $client;

    public function __construct(?string $key = null) {
        $this->key     = $key ?? config('moralis.key');
        $this->client  = new Client([
            'base_uri' => 'https://deep-index.moralis.io/api/v2'
        ]);
    }

    public function uploadFile(string $filename, $content)
    {
        try {
            $res = $this->client->request('POST', '/ipfs/uploadFolder', [
                'json'     => [
                    'path'     => $filename,
                    'content'  => $content,
                ],
                'headers'  => [
                    'accept'        => 'application/json',
                    'X-API-KEY'     => $this->key,
                    // 'x-qm-key'      => $this->key,
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

    public function uploadFiles(array $files) {
        try {
            $res = $this->client->request('POST', '/ipfs/uploadFolder', [
                'json'     => $files,
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
