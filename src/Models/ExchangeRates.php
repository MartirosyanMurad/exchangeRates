<?php

namespace Src\Models;

interface ExchangeRate
{
    public function getName();
    public function getValue();
}