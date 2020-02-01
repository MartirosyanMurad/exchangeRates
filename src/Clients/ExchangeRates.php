<?php

namespace Src\Clients;

use Src\Models\ExchangeRate;

interface ExchangeRates
{
    /**
     * @return ExchangeRate[]
     */
    public function get(): array;
}
