<?php

namespace CultuurNet\SearchV3\Parameter;

use PHPUnit\Framework\TestCase;

class TermIdsTest extends TestCase
{
    public function testConstructor()
    {
        $termId = new TermIds('JCjA0i5COUmdjMwcyjNAFA');

        $key = $termId->getKey();
        $value = $termId->getValue();

        $this->assertEquals($key, 'termIds');
        $this->assertEquals($value, 'JCjA0i5COUmdjMwcyjNAFA');
    }
}
