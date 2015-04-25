<?php
namespace Ayeo\Geo;

use Ayeo\Geo\Coordinate\AbstractCoordinate;

class DistanceCalculator
{
    /**
     * @var int
     */
    private $radius = 6371000;

    /**
     * @var int
     */
    private $precision = 2;

    /**
     * @var int
     */
    private $multiplier = 1;

    /**
     * @param integer $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @param float $multiplier
     */
    public function setMultiplier($multiplier)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * @param $radius in meters
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @link http://en.wikipedia.org/wiki/Vincenty%27s_formulae
     * @param AbstractCoordinate $coordinateA
     * @param AbstractCoordinate $coordinateB
     * @return float distance in meters
     */
    public function getDistance(AbstractCoordinate $coordinateA, AbstractCoordinate $coordinateB)
    {
        $lonDelta = $coordinateB->getRadianLongitude() - $coordinateA->getRadianLongitude();

        $a =
            pow(cos($coordinateB->getRadianLatitude()) * sin($lonDelta), 2) +
            pow(cos($coordinateA->getRadianLatitude()) * sin($coordinateB->getRadianLatitude()) -
            sin($coordinateA->getRadianLatitude()) * cos($coordinateB->getRadianLatitude()) * cos($lonDelta), 2);

        $b =
            sin($coordinateA->getRadianLatitude()) * sin($coordinateB->getRadianLatitude()) +
            cos($coordinateA->getRadianLatitude()) * cos($coordinateB->getRadianLatitude()) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);

        return $this->process($angle * $this->radius);
    }

    /**
     * @param $distanceInMeters
     * @return float
     */
    private function process($distanceInMeters)
    {
        return round($distanceInMeters * $this->multiplier, $this->precision);
    }
}