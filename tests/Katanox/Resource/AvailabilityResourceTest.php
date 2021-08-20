<?php

namespace Katanox\Resource;

use GuzzleHttp\Psr7\Response;
use Katanox\Exceptions\HttpException;
use Katanox\Exceptions\KatanoxException;
use Katanox\Exceptions\MissingParametersException;
use Katanox\Http\Client;
use Katanox\Model\AvailabilityAndPrice;
use Katanox\Model\AvailabilityLinks;
use Katanox\Model\AvailabilityMetaData;
use Katanox\Model\Facility;
use Katanox\Model\Image;
use Katanox\Model\Location;
use Katanox\Model\Price;
use Katanox\Model\Property;
use Katanox\Model\Query\AvailabilityQuery;
use Katanox\Model\RatePlan;
use Katanox\Model\RatePlanPolicy;
use Katanox\Model\Translation;
use Katanox\Model\Unit;
use PHPUnit\Framework\TestCase;

/**
 * @property AvailabilityResource availabilityResource
 *
 * @internal
 * @coversNothing
 */
class AvailabilityResourceTest extends TestCase
{
    /**
     * @throws MissingParametersException
     * @throws HttpException
     * @throws KatanoxException
     */
    public function testSuccessfulSearch()
    {
        $property = $this->buildPropertyObject();
        $metaData = new AvailabilityMetaData(1, 1);
        $link = new AvailabilityLinks(null, null, null, null);

        $mockHttpClient = \Mockery::mock(Client::class);
        $mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/availability',
                'abc',
                [
                    'check_in' => '2021-07-08',
                    'check_out' => '2021-07-10',
                    'adults' => 1,
                    'children' => 0,
                    'lat' => 0.00001,
                    'lng' => 0.00002,
                    'radius' => 10000,
                    'page' => 1,
                    'limit' => 25,
                    'include' => null,
                    'locale' => null,
                    'property_ids' => null,
                ],
            ])
            ->andReturn(
                new Response(200, [], json_encode(['data' => ['properties' => [$property]], 'meta' => $metaData, 'links' => $link]))
            )
        ;
        $this->availabilityResource = new AvailabilityResource($mockHttpClient, 'https://api.katanox.com', 'abc');
        $q = new AvailabilityQuery();
        $q->setCheckIn('2021-07-08')
            ->setCheckOut('2021-07-10')
            ->setAdults(1)
            ->setChildren(0)
            ->setLat(0.00001)
            ->setLng(0.00002)
            ->setRadius(10000)
            ->setPage(1)
            ->setLimit(25)
        ;
        $res = $this->availabilityResource->search($q);

        $this->assertObjectHasAttribute('prices', $res->getData()->properties[0]);
        $this->assertObjectHasAttribute('units', $res->getData()->properties[0]);
        $this->assertObjectHasAttribute('rate_plans', $res->getData()->properties[0]);
        $this->assertEquals('ABC456FG', $res->getData()->properties[0]->getPrices()[0]->unit_id);
        $this->assertEquals('REW2H24G', $res->getData()->properties[0]->getPrices()[0]->rate_plan_id);
        $this->assertEquals('ABCDEFG', $res->getData()->properties[0]->getPrices()[0]->property_id);
        $this->assertEquals(156, $res->getData()->properties[0]->getPrices()[0]->price->getAmount());
        $this->assertEquals('EUR', $res->getData()->properties[0]->getPrices()[0]->price->getCurrency());
    }

    /**
     * @throws MissingParametersException
     * @throws HttpException
     */
    public function testKatanoxSDKException()
    {
        $this->expectException(KatanoxException::class);
        $property = $this->buildPropertyObject();
        $mockHttpClient = \Mockery::mock(Client::class);
        $mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/availability',
                'abc',
                [
                    'check_in' => '2021-07-08',
                    'check_out' => '2021-07-10',
                    'adults' => 1,
                    'children' => 0,
                    'lat' => 0.00001,
                    'lng' => 0.00002,
                    'radius' => 10000,
                    'page' => null,
                    'limit' => null,
                    'include' => null,
                    'locale' => null,
                    'property_ids' => null,
                ],
            ])
            ->andReturn(new Response(
                200,
                [],
                json_encode(['data' => ['properties' => [$property]], 'metas' => [], 'link' => []]) . 'invalidjsonline'
            ))
        ;
        $this->availabilityResource = new AvailabilityResource($mockHttpClient, 'https://api.katanox.com', 'abc');
        $q = new AvailabilityQuery();
        $q->setCheckIn('2021-07-08')
            ->setCheckOut('2021-07-10')
            ->setAdults(1)
            ->setChildren(0)
            ->setLat(0.00001)
            ->setLng(0.00002)
            ->setRadius(10000)
        ;
        $this->availabilityResource->search($q);
    }

    /**
     * @throws HttpException
     * @throws KatanoxException
     */
    public function testMissingParametersException()
    {
        $this->expectException(MissingParametersException::class);
        $property = $this->buildPropertyObject();
        $mockHttpClient = \Mockery::mock(Client::class);
        $mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/availability',
                'abc',
                [
                    'check_in' => '2021-07-08',
                    'check_out' => '2021-07-10',
                    'adults' => 1,
                    'children' => 0,
                    'lat' => 0.00001,
                    'lng' => 0.00002,
                    'radius' => 10000,
                    'page' => null,
                    'limit' => null,
                    'include' => null,
                    'locale' => null,
                    'property_ids' => null,
                ],
            ])
            ->andReturn(new Response(
                200,
                [],
                json_encode(['data' => ['properties' => [$property]], 'metas' => [], 'link' => []]) . 'invalidjsonline'
            ))
        ;
        $this->availabilityResource = new AvailabilityResource($mockHttpClient, 'https://api.katanox.com', 'abc');
        $q = new AvailabilityQuery();
        $q->setCheckIn('2021-07-08')
            ->setChildren(0)
            ->setRadius(10000)
        ;
        $this->availabilityResource->search($q);
    }

    private function buildPropertyObject(): Property
    {
        $unit = new Unit();
        $unit->setId('ABC456FG')
            ->setName('Room with a Balcony')
            ->setDescription('Great room with sea view')
            ->setImages([
                new Image('Featured', 'https://cdn.traveldata.io/katanox-inventory/hotels/ABCDEFG/media/image1.jpg'),
                new Image('', 'https://cdn.traveldata.io/katanox-inventory/hotels/ABCDEFG/media/image2.jpg'),
            ])
            ->setAmenities([
                new Facility('Room amenities', 'Sofa Bed'),
            ])
        ;
        $ratePlan = new RatePlan();
        $ratePlan->setId('REW2H24G')
            ->setName('Best Available Rate')
            ->setDescription('Best rate for this room')
            ->setCancellationPolicy(
                new RatePlanPolicy('Non-Refundable', 'This rate is not refundable', 'percentage', 100)
            )
            ->setNoShowPolicy(
                new RatePlanPolicy('No Show Policy', 'The full rate is charged in case of a no show', 'percentage', 100)
            )
        ;
        $property = new Property();

        return $property->setId('ABCDEFG')
            ->setName('Amsterdam Hotel')
            ->setDescription('An iconic hotel in the city center of Amsterdam')
            ->setStars(5)
            ->setAddressLine1('123 Amsterdam street')
            ->setAddressLine2('Noord Holland')
            ->setCity('Amsterdam')
            ->setPostcode('1012 KZ')
            ->setCountry('The Netherlands')
            ->setLocation(new Location(52.369523, 4.8918846))
            ->setPhoneNumber('01294910414')
            ->setEmail('hello@katanox.com')
            ->setCurrency('EUR')
            ->setImages([
                new Image('Featured', 'https://cdn.traveldata.io/katanox-inventory/hotels/ABCDEFG/media/image1.jpg'),
                new Image('', 'https://cdn.traveldata.io/katanox-inventory/hotels/ABCDEFG/media/image2.jpg'),
            ])
            ->setTranslations([
                new Translation('Ενα εικονικό ξενοδοχείο στο κέντρο του Άμστερνταμ', 'el'),
            ])
            ->setFacilities([
                new Facility('Activities', 'Tennis Equipment'),
            ])
            ->setUnits([
                $unit,
            ])
            ->setRatePlans([
                $ratePlan,
            ])->setPrices([
                new AvailabilityAndPrice('ABC456FG', 'REW2H24G', 'ABCDEFG', new Price(156, 'EUR')),
            ]);
    }
}
