<?php

declare(strict_types=1);

namespace App\Clock\Factory;

use App\Clock\Model\Clock;
use App\Clock\Time\TimeInterface;

class ClockFactory implements ClockFactoryInterface
{
    public function __construct(
        private readonly TimeInterface $time,
    ) {
    }

    public function create(): Clock
    {
        return new Clock($this->time->now());
    }
}
