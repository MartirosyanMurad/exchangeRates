<?php

namespace Src\Connections;

class Db
{
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getConnection(): PDO
    {
        if (!is_resource(self::$instance)) {
            self::$instance = new PDO('');
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @return PDOStatement|null
     */
    public function run($sql): ?PDOStatement
    {
        try {
            @$result = $this->getConnection()->query($sql);
        } catch (PDOException $e) {
            // Todo do something, for example retry
        }
        return $result;
    }
}