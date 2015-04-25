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
        if ($direction === "N")
        {
            $this->latitude = $this->convert($degrees, $minutes, $seconds);
        }
        else
        {
            $this->latitude = $this->convert($degrees, $minutes, $seconds) * -1;
        }
    }

    /**
     * @param integer $degrees
     * @param integer $minutes
     * @param integer $seconds
     * @param string $direction
     */
    public function setLongitude($degrees, $minutes, $seconds, $direction = "E")
    {
        if ($direction === "E")
        {
            $this->longitude = $this->convert($degrees, $minutes, $seconds);
        }
        else
        {
            $this->longitude = $this->convert($degrees, $minutes, $seconds) * -1;
        }
    }

    /**
     * @param integer $degrees
     * @param integer $minutes
     * @param integer $seconds
     * @return float
     */
    private function convert($degrees, $minutes, $seconds)
    {
        return $degrees + $minutes / 60 + $seconds / 3600;
    }
}