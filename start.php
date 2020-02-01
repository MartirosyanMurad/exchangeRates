<?php

require __DIR__ . '/vendor/autoload.php';

use Src\Clients\ExchangeRatesHttpClient;
use Src\Storage\CacheExchangeRates;
use Src\Storage\DbExchangeRates;
use Src\Worker;

(new Worker(
    new CacheExchangeRates(),
    new DbExchangeRates(),
    new ExchangeRatesHttpClient()
))->updateExchangeRates();