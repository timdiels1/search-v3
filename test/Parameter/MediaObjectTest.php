<?php

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

class MediaObjectTest extends TestCase
{
    public function testConstructor()
    {
        $mediaObject = new MediaObject(true);

        $key = $mediaObject->getKey();
        $value = $mediaObject->getValue();

        $this->assertEquals($key, 'hasMediaObject');
        $this->assertTrue($value);
    }
}
