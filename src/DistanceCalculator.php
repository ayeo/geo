<?php
namespace Ayeo\Geo;

use Ayeo\Geo\Coordinate\AbstractCoordinate;

class DistanceCalculator
{
    const EARTH_RADIUS = 6371000;

    /**
     * @link http://en.wikipedia.org/wiki/Vincenty%27s_formulae
     * @param AbstractCoordinate $coordinateA
     * @param AbstractCoordinate $coordinateB
     * @return float distance in meters
     */
    public function calculate(AbstractCoordinate $coordinateA, AbstractCoordinate $coordinateB)
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

        return $angle * self::EARTH_RADIUS;
    }
}