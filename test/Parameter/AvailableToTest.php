<?php

namespace CultuurNet\SearchV3\Parameter;

use DateTime;
use PHPUnit\Framework\TestCase;

class AvailableToTest extends TestCase
{
    public function testConstructor()
    {
        $dateTime = '2017-04-11T12:08:01+01:00';
        $availableTo = new AvailableTo($dateTime);

        $key = $availableTo->getKey();
        $value = $availableTo->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testFactoryMethodWithDateTime()
    {
        $dateTime = new DateTime('2017-04-11T12:08:01+01:00');
        $availableFrom = AvailableTo::createFromDateTime($dateTime);

        $key = $availableFrom->getKey();
        $value = $availableFrom->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('2017-04-11T12:08:01+01:00', $value);
    }

    public function testConstructorWithWildcard()
    {
        $wildCard = '*';
        $id = new AvailableTo($wildCard);

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals('availableTo', $key);
        $this->assertEquals('*', $value);
    }
}
