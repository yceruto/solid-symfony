<?php

declare(strict_types=1);

namespace App\Clock\Time\World;

use App\Clock\Time\TimeFactoryInterface;
use App\Clock\Time\TimeInterface;
use RuntimeException;

class WorldTimeFactory implements TimeFactoryInterface
{
    public function supports(string $name): bool
    {
        return 'world' === $name;
    }

    public function create(string $name): TimeInterface
    {
        if (!$this->supports($name)) {
            throw new RuntimeException('Adapter is not supported');
        }

        return new WorldTime();
    }
}
