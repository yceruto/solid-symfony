<?php

declare(strict_types=1);

namespace App\Clock\Time\Local;

use App\Clock\Time\TimeFactoryInterface;
use App\Clock\Time\TimeInterface;
use RuntimeException;

class LocalTimeFactory implements TimeFactoryInterface
{
    public function supports(string $name): bool
    {
        return 'local' === $name;
    }

    public function create(string $name): TimeInterface
    {
        if (!$this->supports($name)) {
            throw new RuntimeException('Adapter is not supported');
        }

        return new LocalTime();
    }
}
