<?php

namespace Katanox\Resource;

use JsonMapper;
use Katanox\Exceptions\HttpException;
use Katanox\Exceptions\KatanoxException;
use Katanox\Http\Client;
use Katanox\KatanoxRequest;
use Katanox\Model\Property;
use Katanox\Model\RatePlan;
use Katanox\Model\RequestResult\GetPropertiesResult;
use Katanox\Model\Unit;

class PropertyResource
{
    protected $BASE_URL;

    private string $apiKey;
    private Client $client;
    private JsonMapper $mapper;

    public function __construct(Client $client, string $apiKey)
    {
        $this->BASE_URL= 'https://api.katanox.com/v1/properties';
        $this->client = $client;
        $this->apiKey = $apiKey;
        $this->mapper = new JsonMapper();
        $this->mapper->bStrictNullTypes = false;
        $this->mapper->bIgnoreVisibility = true;
    }

    /**
     * Returns a list of properties that are connected to you based on the API key.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getProperties(): GetPropertiesResult
    {
        $req = new KatanoxRequest(
            'GET',
            $this->BASE_URL,
            $this->apiKey,
            []
        );

        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $result = new GetPropertiesResult();

            if (200 === $res->getStatusCode()) {
                $properties = $this->mapper->mapArray($response->data->property, [], Property::class);
                $result->setProperties($properties);
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Could not fetch properties', $e->getMessage()));
        }

        return $result;
    }

    /**
     * Returns a specific Property.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getProperty(string $propertyId): ?Property
    {
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s', $this->BASE_URL, $propertyId),
            $this->apiKey,
            []
        );

        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $property = null;
            if (200 === $res->getStatusCode()) {
                $property = $this->mapper->map($response->data->property, new Property());
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Could not fetch property with id %s', $e->getMessage(), $propertyId));
        }

        return $property;
    }

    /**
     * Returns a specific Unit.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getUnit(string $propertyId, string $unitId): ?Unit
    {
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s/units/%s', $this->BASE_URL, $propertyId, $unitId),
            $this->apiKey,
            []
        );

        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $unit = null;
            if (200 === $res->getStatusCode()) {
                $unit = $this->mapper->map($response->data->unit, new Unit());
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Could not fetch unit with id %s', $e->getMessage(), $unitId));
        }

        return $unit;
    }

    /**
     * Returns a specific Rate Plan.
     *
     * @throws KatanoxException There was an error mapping the API response to the model object
     * @throws HttpException    The HTTP request could not be completed
     */
    public function getRatePlan(string $propertyId, string $ratePlanId): ?RatePlan
    {
        $req = new KatanoxRequest(
            'GET',
            sprintf('%s/%s/rate-plans/%s', $this->BASE_URL, $propertyId, $ratePlanId),
            $this->apiKey,
            []
        );

        $res = $this->client->request(
            $req->method,
            $req->url,
            $req->apiKey,
            $req->params
        );

        try {
            $response = json_decode((string) $res->getBody());
            $ratePlan = null;
            if (200 === $res->getStatusCode()) {
                $ratePlan = $this->mapper->map($response->data->rate_plan, new RatePlan());
            }
        } catch (\Exception $e) {
            throw new KatanoxException(sprintf('Could not fetch rate plan with id %s', $e->getMessage(), $ratePlanId));
        }

        return $ratePlan;
    }
}
