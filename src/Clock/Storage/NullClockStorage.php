<?php

declare(strict_types=1);

namespace App\Clock\Storage;

use App\Clock\Model\Clock;

class NullClockStorage implements ClockStorageInterface
{
    public function load(): Clock
    {
        return new Clock();
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
