<?php

declare(strict_types=1);

namespace App\Clock\Storage;

use App\Clock\Model\Clock;

interface ClockStorageInterface
{
    public function load(): Clock;

    public function save(Clock $clock): void;

    public function clear(): void;
}
