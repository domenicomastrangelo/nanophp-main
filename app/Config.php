<?php

namespace App;

class Config
{
    public const BASE_PATH = __DIR__ . '/..';
    public const VIEWS_PATH = __DIR__ . '/Views';
    public const CACHE_PATH = __DIR__ . '/Cache';

    public const DB_NAME = 'database';
    public const DB_USER = 'user';
    public const DB_PASS = 'password';
    public const DB_HOST = 'mariadb';

    public const DEBUG_MODE = true;

    public static function getDBOptions(): array
    {
        return [
            'DB_NAME'   => static::DB_NAME,
            'DB_USER'   => static::DB_USER,
            'DB_PASS'   => static::DB_PASS,
            'DB_HOST'   => static::DB_HOST,
        ];
    }

    public static function getAllOptions()
    {
        return [
            'BASE_PATH'  => static::BASE_PATH,
            'VIEWS_PATH' => static::VIEWS_PATH,
            'DB_OPTIONS' => [
                'DB_NAME'   => static::DB_NAME,
                'DB_USER'   => static::DB_USER,
                'DB_PASS'   => static::DB_PASS,
                'DB_HOST'   => static::DB_HOST,
            ]
        ];
    }
}
