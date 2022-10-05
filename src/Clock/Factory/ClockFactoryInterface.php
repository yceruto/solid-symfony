<?php

declare(strict_types=1);

namespace App\Clock\Factory;

use App\Clock\Model\Clock;

interface ClockFactoryInterface
{
    public function create(): Clock;
}
