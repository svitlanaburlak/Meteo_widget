<?php

namespace App\Model;

class WeatherModel
{
    /**
     * Return forecast array
     * 
     * @return array Forecast Array
     */
    public static function getWeatherData(): array
    {
        return self::$weatherData;
    }

    /**
     * Return forecast array with the given id
     * 
     * @param int $index forecast index
     * 
     * @return null|array Null if the demanded forecast is not found
     */
    public static function getWeatherByCityIndex(int $index): ?array
    {
        if (!isset(self::$weatherData[$index])) {
            return null;
        }

        return self::$weatherData[$index];
    }

    /**
     * @var [][] Forecast Array
     */
    private static $weatherData = [
        1 => [
            'city' => 'Annecy',
            'weather' => 'snow',
            'date' => '29-01-2020',
            'min' => -4,
            'max' => 2,
        ],

        2 => [
            'city' => 'Biarritz',
            'weather' => 'rain',
            'date' => '29-01-2020',
            'min' => -5,
            'max' => 0,
        ],

        3 => [
            'city' => 'Bordeaux',
            'weather' => 'sun-cloud',
            'date' => '29-01-2020',
            'min' => 0,
            'max' => 10,
        ],

        4 => [
            'city' => 'Bruxelles',
            'weather' => 'storm',
            'date' => '29-01-2020',
            'min' => -3,
            'max' => 5,
        ],

        5 => [
            'city' => 'Chambéry',
            'weather' => 'sun-cloud',
            'date' => '29-01-2020',
            'min' => -2,
            'max' => 6,
        ],

        6 => [
            'city' => 'Grenoble',
            'weather' => 'snow',
            'date' => '29-01-2020',
            'min' => -3,
            'max' => 3,
        ],

        7 => [
            'city' => 'Lille',
            'weather' => 'clouds',
            'date' => '29-01-2020',
            'min' => 1,
            'max' => 7,
        ],

        8 => [
            'city' => 'Lyon',
            'weather' => 'snow',
            'date' => '29-01-2020',
            'min' => 3,
            'max' => 12,
        ],

        9 => [
            'city' => 'Marseille',
            'weather' => 'shower',
            'date' => '29-01-2020',
            'min' => -5,
            'max' => 5,
        ],

        10 => [
            'city' => 'Metz',
            'weather' => 'snow',
            'date' => '29-01-2020',
            'min' => 2,
            'max' => 7,
        ],

        11 => [
            'city' => 'Montpellier',
            'weather' => 'shower',
            'date' => '29-01-2020',
            'min' => 3,
            'max' => 11,
        ],

        12 => [
            'city' => 'Nantes',
            'weather' => 'sun-cloud',
            'date' => '29-01-2020',
            'min' => 0,
            'max' => 6,
        ],

        13 => [
            'city' => 'Nice',
            'weather' => 'snow',
            'date' => '29-01-2020',
            'min' => -3,
            'max' => 3,
        ],

        14 => [
            'city' => 'Paris',
            'weather' => 'shower',
            'date' => '29-01-2020',
            'min' => 2,
            'max' => 11,
        ],

        15 => [
            'city' => 'Rouen',
            'weather' => 'sun',
            'date' => '29-01-2020',
            'min' => 0,
            'max' => 8,
        ],

        16 => [
            'city' => 'Toulouse',
            'weather' => 'shower',
            'date' => '29-01-2020',
            'min' => 1,
            'max' => 9,
        ],
    ];
}
