<?php

namespace Src;

use Src\Clients\ExchangeRates;
use Src\Models\ExchangeRate;
use Src\Storage\CacheExchangeRates;
use Src\Storage\DbExchangeRates;

class Worker
{
    /**
     * @var CacheExchangeRates
     */
    private $cacheStorage;

    /**
     * @var DbExchangeRates
     */
    private $dbStorage;

    /**
     * @var ExchangeRates
     */
    private $exchangeRatesClient;

    /**
     * @var bool
     */
    private $isRun = true;

    public function __construct(
        CacheExchangeRates $cacheStorage,
        DbExchangeRates $dbStorage,
        ExchangeRates $exchangeRatesClient)
    {
        $this->cacheStorage = $cacheStorage;
        $this->dbStorage = $dbStorage;
        $this->exchangeRatesClient = $exchangeRatesClient;
        $this->setupSignalHandler();
    }

    public function updateExchangeRates()
    {
        while ($this->isRun) {
            // get exchange rates from external resource
            $exchangeRates = $this->getExchangeRates();
            // set/update cache
            $this->cacheStorage->set($exchangeRates);
            // set/update db
            $this->dbStorage->set($exchangeRates);

            usleep(100000);
        }
    }

    /**
     * @return ExchangeRate[]
     */
    private function getExchangeRates(): array
    {
        return $this->exchangeRatesClient->get();
    }

    private function setupSignalHandler(): void
    {
        pcntl_async_signals(true);
        pcntl_signal(SIGTERM, [$this, 'stopProcess']);
    }

    public function stopProcess(): void
    {
        $this->isRun = false;
    }
}