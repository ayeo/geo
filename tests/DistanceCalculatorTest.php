<?php

use Ayeo\Geo\Coordinate;
use Ayeo\Geo\DistanceCalculator;

class DistanceCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testDistanceBetweenGrudziadzAndGliwice()
    {
        //Grudziądz: 53°29′13″N 18°45′25″E
        $grudziądz = new Coordinate\Degree();
        $grudziądz->setLatitude(53, 29, 13, 'N');
        $grudziądz->setLongitude(18, 45, 25, 'E');

        //Gliwice: 50°17′32″N 18°40′03″E
        $gliwice = new Coordinate\Degree();
        $gliwice->setLatitude(50, 17, 32, 'N');
        $gliwice->setLongitude(18, 40, 03, 'E');

        $calculator = new DistanceCalculator();
        $distance = $calculator->getDistance($grudziądz, $gliwice);

        $this->assertEquals(355.28, $distance / 1000, '', 0.01);
    }

    public function testDistanceBetweenLondonAndBuenosAires()
    {
        $london = $this->getLondonCoordinate();
        $buenosAires = $this->getBuenosAiresCoordinate();

        $calculator = new DistanceCalculator();
        $distance = $calculator->getDistance($london, $buenosAires);


        $this->assertEquals(11152.27, $distance / 1000, '', 0.01);
    }

    public function testMultiplier()
    {
        $london = $this->getLondonCoordinate();
        $buenosAires = $this->getBuenosAiresCoordinate();

        $calculator = new DistanceCalculator();

        $calculator->setMultiplier(1/1000); // km
        $distance = $calculator->getDistance($buenosAires, $london);
        $this->assertEquals(11152.28, $distance, '', 0.01);

        $calculator->setMultiplier(1/1000000); // 1000 km
        $distance = $calculator->getDistance($buenosAires, $london);
        $this->assertEquals(11.15, $distance, '', 0.01);
    }


    public function testMultiplierAndPrecision()
    {
        $london = $this->getLondonCoordinate();
        $buenosAires = $this->getBuenosAiresCoordinate();

        $calculator = new DistanceCalculator();

        $calculator->setMultiplier(1/1000); // km
        $calculator->setPrecision(0);
        $distance = $calculator->getDistance($buenosAires, $london);
        $this->assertEquals(11152, $distance);

        $calculator->setMultiplier(1/1000000); // 1000 km
        $calculator->setPrecision(0);
        $distance = $calculator->getDistance($buenosAires, $london);
        $this->assertEquals(11, $distance);
    }

    /**
     * @return Coordinate\Degree
     */
    private function getLondonCoordinate()
    {
        //London: 51°30′N 0°07′W
        $london = new Coordinate\Degree();
        $london->setLatitude(51, 30, 00, 'N');
        $london->setLongitude(00, 07, 00, 'W');

        return $london;
    }

    /**
     * @return Coordinate\Degree
     */
    private function getBuenosAiresCoordinate()
    {
        //Buenos Aires: 34°35′S 58°55′W
        $buenosAires = new Coordinate\Degree();
        $buenosAires->setLatitude(34, 35, 00, 'S');
        $buenosAires->setLongitude(58, 55, 00, 'W');

        return $buenosAires;
    }
}