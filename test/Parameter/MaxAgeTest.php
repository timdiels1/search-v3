<?php

namespace CultuurNet\SearchV3\Parameter;

class MaxAgeTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $id = new MaxAge('16');

        $key = $id->getKey();
        $value = $id->getValue();

        $this->assertEquals($key, 'maxAge');
        $this->assertEquals($value, '16');
    }
}
