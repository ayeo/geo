<?php
namespace Ayeo\Geo\Coordinate;

class Degree extends AbstractCoordinate
{
    /**
     * @param integer $degrees
     * @param integer $minutes
     * @param integer $seconds
     * @param string $direction
     */
    public function setLatitude($degrees, $minutes, $seconds, $direction = "N")
    {
        $x = $degrees + $minutes / 60 + $seconds / 3600;

        if ($direction === "S") {
            $x = $x * -1;
        }

        $this->latitude = $x;
    }

    /**
     * @param integer $degrees
     * @param integer $minutes
     * @param integer $seconds
     * @param string $direction
     */
    public function setLongitude($degrees, $minutes, $seconds, $direction = "E")
    {
        $x = $degrees + $minutes / 60 + $seconds / 3600;

        if ($direction === "W") {
            $x = $x * -1;
        }

        $this->longitude = $x;
    }
}