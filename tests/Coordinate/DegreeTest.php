<?php

use Ayeo\Geo\Coordinate\Degree as Coordinate;

class CoordinateDegreeTest extends PHPUnit_Framework_TestCase
{
    public function testConversion()
    {
        $coordinate = new Coordinate();
        $coordinate->setLatitude(53, 10, 25);
        $coordinate->setLongitude(18, 10, 16);

        $this->assertEquals(53.1736, $coordinate->getLatitude(), '', 0.0001);
        $this->assertEquals(18.1711, $coordinate->getLongitude(), '', 0.0001);
    }
}