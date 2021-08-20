<?php

namespace Katanox\Resource;

use JsonMapper;
use Katanox\Exceptions\HttpException;
use Katanox\Exceptions\KatanoxException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Http\Client;
use Katanox\KatanoxRequest;
use Katanox\Model\Availability;
use Katanox\Model\Query\AvailabilityQuery;

class AvailabilityResource
{
    public const RESOURCE_ENDPOINT = 'v1/availability';
    /**
     * @var null|Availability stores the last request made to Endpoint
     */
    protected $lastResponse;

    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var JsonMapper
     */
    private $mapper;

    public function __construct(Client $client, string $baseUrl, string $apiKey)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
        $this->mapper = new JsonMapper();
        $this->mapper->bStrictNullTypes = false;
        $this->mapper->bIgnoreVisibility = true;
    }

    /**
     * Search for available rooms in the Katanox API.
     *
     * @throws KatanoxException           There was an error mapping the API response to the model object
     * @throws HttpException              The HTTP request could not be completed
     * @throws MissingParametersException The query object does not have the minimum parameters set
     *
     * @return Availability an array of available properties
     */
    public function search(AvailabilityQuery $query): Availability
    {
        $query->validate();
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s', $this->baseUrl, self::RESOURCE_ENDPOINT),
            $this->apiKey,
            $query->toArray()
        );
        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $this->lastResponse = new Availability();
            $this->mapper->map(json_decode((string) $res->getBody()), $this->lastResponse);
            $this->lastResponse->setRequest($req);
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
        }

        return $this->lastResponse;
    }

    /**
     * Sends a request to availability for the next page of results.
     *
     * @param Availability $availability the Availability to paginate over
     *
     * @throws HttpException
     * @throws KatanoxException
     */
    public function next(Availability $availability): ?Availability
    {
        if (null != $availability->getLinks()->getNext()) {
            $req = $availability->getRequest();
            $req->setUrl($availability->getLinks()->getNext()->getUrl());
            $req->setMethod($availability->getLinks()->getNext()->getMethod());
            $res = $this->client->request(
                $req->method,
                $req->url,
                $req->apiKey
            );

            try {
                $this->mapper->map(json_decode((string) $res->getBody()), $this->lastResponse);
                $this->lastResponse->setRequest($req);
            } catch (\Exception $e) {
                throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
            }

            return $this->lastResponse;
        }

        return null;
    }

    /**
     * Sends a request to availability for the previous page of results.
     *
     * @param Availability $availability the Availability to paginate over
     *
     * @throws HttpException
     * @throws KatanoxException
     */
    public function previous(Availability $availability): ?Availability
    {
        if (null != $availability->getLinks()->getPrevious()) {
            $req = $availability->getRequest();
            $req->setUrl($availability->getLinks()->getPrevious()->getUrl());
            $req->setMethod($availability->getLinks()->getPrevious()->getMethod());
            $res = $this->client->request(
                $req->getMethod(),
                $req->getUrl(),
                $req->getApiKey()
            );

            try {
                $this->mapper->map(json_decode((string) $res->getBody()), $this->lastResponse);
                $this->lastResponse->setRequest($req);
            } catch (\Exception $e) {
                throw new KatanoxException(sprintf('Unable to map the Katanox API response to the model object reason %s', $e->getMessage()));
            }

            return $this->lastResponse;
        }

        return null;
    }
}
