<?php

namespace App;

class Routes
{
    public static function getRoutes(): array
    {
        return [
            [
                'method' => 'GET',
                'route'  => [
                    '/' => 'Home@homepage'
                ]
            ]
        ];
    }
}
