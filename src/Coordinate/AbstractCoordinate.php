<?php
namespace Ayeo\Geo\Coordinate;

abstract class AbstractCoordinate
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $latitude;


    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getRadianLatitude()
    {
        return deg2rad($this->latitude);
    }

    public function getRadianLongitude()
    {
        return deg2rad($this->longitude);
    }
}
