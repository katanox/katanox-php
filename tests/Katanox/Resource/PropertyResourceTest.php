<?php

namespace Katanox\Resource;

use GuzzleHttp\Psr7\Response;
use Katanox\Http\Client;
use Katanox\Model\AvailabilityAndPrice;
use Katanox\Model\Facility;
use Katanox\Model\Image;
use Katanox\Model\Location;
use Katanox\Model\Price;
use Katanox\Model\Property;
use Katanox\Model\RatePlan;
use Katanox\Model\RatePlanPolicy;
use Katanox\Model\Translation;
use Katanox\Model\Unit;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class PropertyResourceTest extends TestCase
{
    private $propertyResource;
    private $mockHttpClient;

    public function setUp(): void
    {
        $this->mockHttpClient = \Mockery::mock(Client::class);
        $this->propertyResource = new PropertyResource($this->mockHttpClient, 'https://api.katanox.com', 'abc');
    }

    public function testFetchPropertiesSuccess()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['property' => [$this->buildPropertyObject()]]])
                )
            )
                             ;

        $res = $this->propertyResource->getProperties();
        $this->assertCount(1, $res->getProperties());
        $this->assertEquals('ABCDEFG', $res->getProperties()[0]->getId());
        $this->assertEquals('ABC456FG', $res->getProperties()[0]->getUnits()[0]->getId());
        $this->assertEquals('REW2H24G', $res->getProperties()[0]->getRatePlans()[0]->getId());
    }

    public function testFetchSpecifiedProperty()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/ABCDEFG',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['property' => $this->buildPropertyObject()]])
                )
            )
                             ;

        $property = $this->propertyResource->getProperty('ABCDEFG');
        $this->assertEquals('ABCDEFG', $property->getId());
    }

    public function testFetchSpecifiedPropertyNonExisting()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/NON_EXISTING',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    [],
                    json_encode([])
                )
            )
                             ;

        $property = $this->propertyResource->getProperty('NON_EXISTING');
        $this->assertNull($property);
    }

    public function testFetchUnitSuccess()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/ABCDEFG/units/ABC456FG',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['unit' => $this->buildUnit()]])
                )
            )
                             ;

        $unit = $this->propertyResource->getUnit('ABCDEFG', 'ABC456FG');
        $this->assertNotNull($unit);
        $this->assertInstanceOf(Unit::class, $unit);
        $this->assertEquals('ABC456FG', $unit->getId());
    }

    public function testFetchUnitDoesNotExist()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/ABCDEFG/units/NON_EXISTING',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    [],
                    json_encode([])
                )
            )
                             ;

        $unit = $this->propertyResource->getUnit('ABCDEFG', 'NON_EXISTING');
        $this->assertNull($unit);
    }

    public function testFetchRatePlanSuccess()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/ABCDEFG/rate-plans/REW2H24G',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    200,
                    [],
                    json_encode(['data' => ['rate_plan' => $this->buildRatePlan()]])
                )
            )
                             ;

        $ratePlan = $this->propertyResource->getRatePlan('ABCDEFG', 'REW2H24G');
        $this->assertNotNull($ratePlan);
        $this->assertInstanceOf(RatePlan::class, $ratePlan);
        $this->assertEquals('REW2H24G', $ratePlan->getId());
    }

    public function testFetchRatePlanDoesNotExist()
    {
        $this->mockHttpClient->shouldReceive('request')
            ->withArgs([
                'GET',
                'https://api.katanox.com/v1/properties/ABCDEFG/rate-plans/NON_EXISTING',
                'abc',
                [],
            ])
            ->andReturn(
                new Response(
                    404,
                    [],
                    json_encode([])
                )
            )
                             ;

        $ratePlan = $this->propertyResource->getRatePlan('ABCDEFG', 'NON_EXISTING');
        $this->assertNull($ratePlan);
    }

    private function buildUnit(): Unit
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

        return $unit;
    }

    private function buildRatePlan(): RatePlan
    {
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

        return $ratePlan;
    }

    private function buildPropertyObject(): Property
    {
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
                $this->buildUnit(),
            ])
            ->setRatePlans([
                $this->buildRatePlan(),
            ])->setPrices([
                new AvailabilityAndPrice('ABC456FG', 'REW2H24G', 'ABCDEFG', new Price(156, 'EUR')),
            ]);

        return $property;
    }
}
