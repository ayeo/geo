<?php
namespace Ayeo\Geo\Coordinate;

class Decimal extends AbstractCoordinate
{
    /**
     * @param float $longitude
     * @param float $latitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}