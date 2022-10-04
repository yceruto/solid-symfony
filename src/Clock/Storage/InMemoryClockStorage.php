<?php

declare(strict_types=1);

namespace App\Clock\Storage;

use App\Clock\Model\Clock;

class InMemoryClockStorage implements ClockStorageInterface
{
    public function load(): Clock
    {
        // TODO: Implement load() method.
    }

    public function save(Clock $clock): void
    {
        // TODO: Implement save() method.
    }

    public function clear(): void
    {
        // TODO: Implement clear() method.
    }
}
