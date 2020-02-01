<?php

namespace Src\Storage;

use Redis;
use Src\Connections\Cache;
use Src\Models\ExchangeRate;

class CacheExchangeRates implements ExchangeRates
{
    /**
     * @var Redis
     */
    private $client;

    public function __construct()
    {
        $this->client = Cache::getConnection();
    }

    /**
     * @param ExchangeRate[] $exchangeRates
     */
    public function set(array $exchangeRates): void
    {
        // TODO: Implement set() method.
    }
}