<?php

namespace Omcod\LaravelPachcaApiWrapper\Classes;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class PachcaApi
{
    public const string API_URL_V1 = 'https://api.pachca.com/api/shared/v1';

    public function __construct(protected array $config = [])
    {
        $this->config = config('pachca');
    }

    /**
     * @throws ConnectionException
     */
    public function requestApiPachca(
        string $method = 'GET',
        string $endpoint = '',
        array $jsonParameters = [],
        string $apiBaseUrl = null
    ): mixed {
        $defaultHeaders = ['Authorization' => $this->config['bearer_token']];
        // Create url.
        $url = self::API_URL_V1 . $endpoint;
        if ($apiBaseUrl) {
            $url = $apiBaseUrl . $endpoint;
        }
        $request = Http::withHeaders($defaultHeaders);
        // Set method request.
        switch ($method) {
            case 'GET':
                $request = $request->get($url);
                break;
            case 'POST':
                $request = $request->post($url, $jsonParameters);
                break;
            case 'PUT':
                $request = $request->put($url, $jsonParameters);
                break;
            case 'DELETE':
                $request = $request->delete($url, $jsonParameters);
                break;
        }
        // Json response;
        return $request->json();
    }

    /**
     * @throws ConnectionException
     */
    public function newDiscussionOrChannel(string $nameChat)
    {
        $jsonParameters = [
            'chat' => [
                "name" => $nameChat
            ]
        ];

        return $this->requestApiPachca("POST", '/chats', $jsonParameters);
    }

    /**
     * @throws ConnectionException
     */
    public function sendMessage(int $chatId, $message)
    {
        $jsonParameters = [
            "message" => [
                "entity_id" => $chatId,
                "content"   => $message
            ]
        ];

        return $this->requestApiPachca("POST", '/messages', $jsonParameters);
    }

}

