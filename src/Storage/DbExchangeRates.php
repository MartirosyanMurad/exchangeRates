<?php

namespace Src\Storage;

use PDO;
use Src\Connections\Db;
use Src\Models\ExchangeRate;

class DbExchangeRates implements ExchangeRates
{
    /**
     * @var PDO
     */
    private $client;

    public function __construct()
    {
        $this->client = Db::getConnection();
    }

    /**
     * @param ExchangeRate[] $exchangeRates
     */
    public function set(array $exchangeRates): void
    {
        // TODO: Implement set() method.
    }
}