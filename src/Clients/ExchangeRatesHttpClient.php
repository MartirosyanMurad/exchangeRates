<?php

namespace Src\Clients;

use Src\Models\ExchangeRate;

class ExchangeRatesHttpClient implements ExchangeRates
{
    /**
     * @return ExchangeRate[]
     */
    public function get(): array
    {
        // todo realize
        return [];
    }
}