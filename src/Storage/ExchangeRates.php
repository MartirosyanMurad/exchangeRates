<?php

namespace Src\Storage;

use Src\Models\ExchangeRate;

interface ExchangeRates
{
    /**
     * @param ExchangeRate[] $exchangeRates
     */
    public function set(array $exchangeRates): void;
}