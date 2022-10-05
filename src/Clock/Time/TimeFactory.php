<?php

declare(strict_types=1);

namespace App\Clock\Time;

use RuntimeException;

class TimeFactory implements TimeFactoryInterface
{
    /**
     * @param iterable<TimeFactoryInterface> $factories
     */
    public function __construct(
        private readonly iterable $factories,
    ) {
    }

    public function supports(string $name): bool
    {
        foreach ($this->factories as $factory) {
            if ($factory->supports($name)) {
                return true;
            }
        }

        return false;
    }

    public function create(string $name): TimeInterface
    {
        foreach ($this->factories as $factory) {
            if ($factory->supports($name)) {
                return $factory->create($name);
            }
        }

        throw new RuntimeException(sprintf('Adapter "%s" is not supported', $name));
    }
}
