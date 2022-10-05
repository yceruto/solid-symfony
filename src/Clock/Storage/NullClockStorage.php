<?php

declare(strict_types=1);

namespace App\Clock\Storage;

use App\Clock\Factory\ClockFactoryInterface;
use App\Clock\Model\Clock;

class NullClockStorage implements ClockStorageInterface
{
    public function __construct(
        private readonly ClockFactoryInterface $factory,
    ) {
    }

    public function load(): Clock
    {
        return $this->factory->create();
    }

    public function save(Clock $clock): void
    {
        // no-op
    }

    public function clear(): void
    {
        // no-op
    }
}
