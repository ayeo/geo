[![Build Status](https://travis-ci.org/ayeo/geo.svg?branch=master)](https://travis-ci.org/ayeo/geo)

Geo Distance
============

Simply way to calculate distance between two geo coordinates


```php
        //London: 51°30′N 0°07′W
        $london = new Coordinate\Degree();
        $london->setLatitude(51, 30, 00, 'N');
        $london->setLongitude(00, 07, 00, 'W');

        //Buenos Aires: 34°35′S 58°55′W
        $buenosAires = new Coordinate\Degree();
        $buenosAires->setLatitude(34, 35, 00, 'S');
        $buenosAires->setLongitude(58, 55, 00, 'W');

        $calculator = new DistanceCalculator();
        $distance = $calculator->calculate($london, $buenosAires);
```
        
You can also use decimal coordinates 
```php
   
        $example = new Coordinate\Decimal(53.2311, 18.1222);
```
