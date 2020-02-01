<?php

namespace Src\Connections;

class Cache
{
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getConnection(): Redis
    {
        if (is_resource(self::$instance)) {
            self::$instance = new Redis();
        }

        return self::$instance;
    }
}