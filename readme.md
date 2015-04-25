[![Build Status](https://travis-ci.org/ayeo/geo.svg?branch=master)](https://travis-ci.org/ayeo/geo)

Geo Distance
============

Simply way to calculate distance between two geo coordinates. There is [Vincenty's formula](http://en.wikipedia.org/wiki/Vincenty%27s_formula) used to do the  calculations.


Install by Composer
===================

```
require: "ayeo/geo": "dev-master"
```

Example use
===========

```php
use Ayeo\Geo\Coordinate;
use Ayeo\Geo\DistanceCalculator;

//London: 51°30′N 0°07′W
$london = new Coordinate\Degree();
$london->setLatitude(51, 30, 00, 'N');
$london->setLongitude(00, 07, 00, 'W');

//Buenos Aires: 34°35′S 58°55′W
$buenosAires = new Coordinate\Degree();
$buenosAires->setLatitude(34, 35, 00, 'S');
$buenosAires->setLongitude(58, 55, 00, 'W');

$calculator = new DistanceCalculator();
$calculator->getDistance($london, $buenosAires); //result in meters
```
        
You can also use decimal coordinates 
```php
$example = new Coordinate\Decimal(53.2311, 18.1222);
```

DistanceCalculator allows to set radius, precision and multiplier. Default radius is set to Earth.

```php
$calculator = new DistanceCalculator();

$calculator->setMultiplier(1); //default value, returns distance in meters
$calculator->setMultiplier(1/1000); //kilometers
$calculator->setMultiplier(1/1000000); //thousands of kilometers

$calculator->setRadius(1737100); //Moon radius :)

$calculator->setPrecision(0); //returns integers
```
