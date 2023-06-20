<?php
/**
 * AvailabilityApi
 * PHP version 7.4.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

/**
 * Katanox API Documentation.
 *
 * The Katanox API allows any travel seller to search and book accommodation.
 *
 * The version of the OpenAPI document: 2.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.5.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Katanox\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use Katanox\ApiException;
use Katanox\Configuration;
use Katanox\HeaderSelector;
use Katanox\ObjectSerializer;
use RuntimeException;

/**
 * AvailabilityApi Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class AvailabilityApi
{
    /** @var string[] */
    public const contentTypes = [
        'getAvailableProperties' => [
            'application/json',
        ],
    ];

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index.
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index.
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getAvailableProperties.
     *
     * Retrieve the list of available properties
     *
     * @param string   $check_in              Date(YYYY-MM-DD) (required)
     * @param string   $check_out             Date(YYYY-MM-DD) (required)
     * @param string   $authorization         Type &#39;Bearer&#39; and then your API Token (required)
     * @param int      $adults                Number of adults (optional, default to 1)
     * @param int      $children              Number of children (optional, default to 0)
     * @param float    $lat                   The Latitude (optional)
     * @param float    $lng                   The Longitude (optional)
     * @param int      $radius                The search radius in meters(m) (optional, default to 2000)
     * @param string[] $property_ids          List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. (optional)
     * @param string[] $negotiated_rate_plans Deprecated! List of negotiated rate plan ids to be included. (optional)
     * @param string   $corporate_profile_id  The corporate_profile_id can be used to fetch specific rates linked to a corporate. (optional, default to 'null')
     * @param int      $number_of_units       The total number of units required (optional, default to 1)
     * @param int      $page                  The returned page number (optional, default to 0)
     * @param int      $limit                 Number of results per page. The maximum value of the limit is 50. (optional, default to 10)
     * @param string   $contentType           The value for the Content-Type header. Check self::contentTypes['getAvailableProperties'] to see the possible values for this operation
     *
     * @return \Katanox\Model\ModelApiError|\Katanox\Model\ModelGetAvailabilityResponse|\Katanox\Model\ModelInternalServerError
     *
     * @throws \Katanox\ApiException    on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getAvailableProperties($check_in, $check_out, $authorization, $adults = 1, $children = 0, $lat = null, $lng = null, $radius = 2000, $property_ids = null, $negotiated_rate_plans = null, $corporate_profile_id = 'null', $number_of_units = 1, $page = 0, $limit = 10, string $contentType = self::contentTypes['getAvailableProperties'][0])
    {
        list($response) = $this->getAvailablePropertiesWithHttpInfo($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $contentType);

        return $response;
    }

    /**
     * Operation getAvailablePropertiesWithHttpInfo.
     *
     * Retrieve the list of available properties
     *
     * @param string   $check_in              Date(YYYY-MM-DD) (required)
     * @param string   $check_out             Date(YYYY-MM-DD) (required)
     * @param string   $authorization         Type &#39;Bearer&#39; and then your API Token (required)
     * @param int      $adults                Number of adults (optional, default to 1)
     * @param int      $children              Number of children (optional, default to 0)
     * @param float    $lat                   The Latitude (optional)
     * @param float    $lng                   The Longitude (optional)
     * @param int      $radius                The search radius in meters(m) (optional, default to 2000)
     * @param string[] $property_ids          List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. (optional)
     * @param string[] $negotiated_rate_plans Deprecated! List of negotiated rate plan ids to be included. (optional)
     * @param string   $corporate_profile_id  The corporate_profile_id can be used to fetch specific rates linked to a corporate. (optional, default to 'null')
     * @param int      $number_of_units       The total number of units required (optional, default to 1)
     * @param int      $page                  The returned page number (optional, default to 0)
     * @param int      $limit                 Number of results per page. The maximum value of the limit is 50. (optional, default to 10)
     * @param string   $contentType           The value for the Content-Type header. Check self::contentTypes['getAvailableProperties'] to see the possible values for this operation
     *
     * @return array of \Katanox\Model\ModelGetAvailabilityResponse|\Katanox\Model\ModelApiError|\Katanox\Model\ModelInternalServerError, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws \Katanox\ApiException    on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getAvailablePropertiesWithHttpInfo($check_in, $check_out, $authorization, $adults = 1, $children = 0, $lat = null, $lng = null, $radius = 2000, $property_ids = null, $negotiated_rate_plans = null, $corporate_profile_id = 'null', $number_of_units = 1, $page = 0, $limit = 10, string $contentType = self::contentTypes['getAvailableProperties'][0])
    {
        $request = $this->getAvailablePropertiesRequest($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $contentType);

        try {
            $options = $this->createHttpClientOption();

            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if ('\Katanox\Model\ModelGetAvailabilityResponse' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Katanox\Model\ModelGetAvailabilityResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Katanox\Model\ModelGetAvailabilityResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];

                case 400:
                    if ('\Katanox\Model\ModelApiError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Katanox\Model\ModelApiError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Katanox\Model\ModelApiError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];

                case 500:
                    if ('\Katanox\Model\ModelInternalServerError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Katanox\Model\ModelInternalServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Katanox\Model\ModelInternalServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\Katanox\Model\ModelGetAvailabilityResponse';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Katanox\Model\ModelGetAvailabilityResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);

                    break;

                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Katanox\Model\ModelApiError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);

                    break;

                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Katanox\Model\ModelInternalServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);

                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getAvailablePropertiesAsync.
     *
     * Retrieve the list of available properties
     *
     * @param string   $check_in              Date(YYYY-MM-DD) (required)
     * @param string   $check_out             Date(YYYY-MM-DD) (required)
     * @param string   $authorization         Type &#39;Bearer&#39; and then your API Token (required)
     * @param int      $adults                Number of adults (optional, default to 1)
     * @param int      $children              Number of children (optional, default to 0)
     * @param float    $lat                   The Latitude (optional)
     * @param float    $lng                   The Longitude (optional)
     * @param int      $radius                The search radius in meters(m) (optional, default to 2000)
     * @param string[] $property_ids          List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. (optional)
     * @param string[] $negotiated_rate_plans Deprecated! List of negotiated rate plan ids to be included. (optional)
     * @param string   $corporate_profile_id  The corporate_profile_id can be used to fetch specific rates linked to a corporate. (optional, default to 'null')
     * @param int      $number_of_units       The total number of units required (optional, default to 1)
     * @param int      $page                  The returned page number (optional, default to 0)
     * @param int      $limit                 Number of results per page. The maximum value of the limit is 50. (optional, default to 10)
     * @param string   $contentType           The value for the Content-Type header. Check self::contentTypes['getAvailableProperties'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws InvalidArgumentException
     */
    public function getAvailablePropertiesAsync($check_in, $check_out, $authorization, $adults = 1, $children = 0, $lat = null, $lng = null, $radius = 2000, $property_ids = null, $negotiated_rate_plans = null, $corporate_profile_id = 'null', $number_of_units = 1, $page = 0, $limit = 10, string $contentType = self::contentTypes['getAvailableProperties'][0])
    {
        return $this->getAvailablePropertiesAsyncWithHttpInfo($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            )
        ;
    }

    /**
     * Operation getAvailablePropertiesAsyncWithHttpInfo.
     *
     * Retrieve the list of available properties
     *
     * @param string   $check_in              Date(YYYY-MM-DD) (required)
     * @param string   $check_out             Date(YYYY-MM-DD) (required)
     * @param string   $authorization         Type &#39;Bearer&#39; and then your API Token (required)
     * @param int      $adults                Number of adults (optional, default to 1)
     * @param int      $children              Number of children (optional, default to 0)
     * @param float    $lat                   The Latitude (optional)
     * @param float    $lng                   The Longitude (optional)
     * @param int      $radius                The search radius in meters(m) (optional, default to 2000)
     * @param string[] $property_ids          List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. (optional)
     * @param string[] $negotiated_rate_plans Deprecated! List of negotiated rate plan ids to be included. (optional)
     * @param string   $corporate_profile_id  The corporate_profile_id can be used to fetch specific rates linked to a corporate. (optional, default to 'null')
     * @param int      $number_of_units       The total number of units required (optional, default to 1)
     * @param int      $page                  The returned page number (optional, default to 0)
     * @param int      $limit                 Number of results per page. The maximum value of the limit is 50. (optional, default to 10)
     * @param string   $contentType           The value for the Content-Type header. Check self::contentTypes['getAvailableProperties'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws InvalidArgumentException
     */
    public function getAvailablePropertiesAsyncWithHttpInfo($check_in, $check_out, $authorization, $adults = 1, $children = 0, $lat = null, $lng = null, $radius = 2000, $property_ids = null, $negotiated_rate_plans = null, $corporate_profile_id = 'null', $number_of_units = 1, $page = 0, $limit = 10, string $contentType = self::contentTypes['getAvailableProperties'][0])
    {
        $returnType = '\Katanox\Model\ModelGetAvailabilityResponse';
        $request = $this->getAvailablePropertiesRequest($check_in, $check_out, $authorization, $adults, $children, $lat, $lng, $radius, $property_ids, $negotiated_rate_plans, $corporate_profile_id, $number_of_units, $page, $limit, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            )
        ;
    }

    /**
     * Create request for operation 'getAvailableProperties'.
     *
     * @param string   $check_in              Date(YYYY-MM-DD) (required)
     * @param string   $check_out             Date(YYYY-MM-DD) (required)
     * @param string   $authorization         Type &#39;Bearer&#39; and then your API Token (required)
     * @param int      $adults                Number of adults (optional, default to 1)
     * @param int      $children              Number of children (optional, default to 0)
     * @param float    $lat                   The Latitude (optional)
     * @param float    $lng                   The Longitude (optional)
     * @param int      $radius                The search radius in meters(m) (optional, default to 2000)
     * @param string[] $property_ids          List of property IDs to be included. When specified, only these properties will be included in the response. The maximum size of property id list is 50. (optional)
     * @param string[] $negotiated_rate_plans Deprecated! List of negotiated rate plan ids to be included. (optional)
     * @param string   $corporate_profile_id  The corporate_profile_id can be used to fetch specific rates linked to a corporate. (optional, default to 'null')
     * @param int      $number_of_units       The total number of units required (optional, default to 1)
     * @param int      $page                  The returned page number (optional, default to 0)
     * @param int      $limit                 Number of results per page. The maximum value of the limit is 50. (optional, default to 10)
     * @param string   $contentType           The value for the Content-Type header. Check self::contentTypes['getAvailableProperties'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Psr7\Request
     *
     * @throws InvalidArgumentException
     */
    public function getAvailablePropertiesRequest($check_in, $check_out, $authorization, $adults = 1, $children = 0, $lat = null, $lng = null, $radius = 2000, $property_ids = null, $negotiated_rate_plans = null, $corporate_profile_id = 'null', $number_of_units = 1, $page = 0, $limit = 10, string $contentType = self::contentTypes['getAvailableProperties'][0])
    {
        // verify the required parameter 'check_in' is set
        if (null === $check_in || (is_array($check_in) && 0 === count($check_in))) {
            throw new InvalidArgumentException(
                'Missing the required parameter $check_in when calling getAvailableProperties'
            );
        }

        // verify the required parameter 'check_out' is set
        if (null === $check_out || (is_array($check_out) && 0 === count($check_out))) {
            throw new InvalidArgumentException(
                'Missing the required parameter $check_out when calling getAvailableProperties'
            );
        }

        // verify the required parameter 'authorization' is set
        if (null === $authorization || (is_array($authorization) && 0 === count($authorization))) {
            throw new InvalidArgumentException(
                'Missing the required parameter $authorization when calling getAvailableProperties'
            );
        }

        if (null !== $lat && $lat > 90) {
            throw new InvalidArgumentException('invalid value for "$lat" when calling AvailabilityApi.getAvailableProperties, must be smaller than or equal to 90.');
        }
        if (null !== $lat && $lat < -90) {
            throw new InvalidArgumentException('invalid value for "$lat" when calling AvailabilityApi.getAvailableProperties, must be bigger than or equal to -90.');
        }

        if (null !== $lng && $lng < -180) {
            throw new InvalidArgumentException('invalid value for "$lng" when calling AvailabilityApi.getAvailableProperties, must be bigger than or equal to -180.');
        }

        $resourcePath = '/availability';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $check_in,
            'check_in', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $check_out,
            'check_out', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $adults,
            'adults', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $children,
            'children', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $lat,
            'lat', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $lng,
            'lng', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $radius,
            'radius', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $property_ids,
            'property_ids', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $negotiated_rate_plans,
            'negotiated_rate_plans', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $corporate_profile_id,
            'corporate_profile_id', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $number_of_units,
            'number_of_units', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // header params
        if (null !== $authorization) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option.
     *
     * @return array of http client options
     *
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: '.$this->config->getDebugFile());
            }
        }

        return $options;
    }
}
