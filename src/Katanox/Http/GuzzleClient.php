<?php

namespace Katanox\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Katanox\Exceptions\HttpException;
use Katanox\Version;

final class GuzzleClient implements Client
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function request(
        string $method,
        string $url,
        string $apiKey,
        array $params = [],
        array $data = [],
        array $headers = [],
        int $timeout = 30
    ): Response {
        try {
            $options = [
                'timeout' => $timeout,
            ];

            if ($method === 'GET') {
                $options['body'] = Query::build($data, PHP_QUERY_RFC1738);
            } else {
                $options['json'] = $data;
            }


            if ($params) {
                $options['query'] = $params;
            }

            $headers['Authorization'] = sprintf('Bearer %s', $apiKey);
            $headers['User-Agent'] = 'katanox-php/' . Version::get();

            $response = $this->client->send(new Request($method, $url, $headers), $options);
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse();
        } catch (\Exception $exception) {
            throw new HttpException('Unable to complete the HTTP request', 0, $exception);
        }

        return new Response($response->getStatusCode(), [], (string) $response->getBody(), $response->getHeaders());
    }
}
