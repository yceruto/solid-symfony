<?php

declare(strict_types=1);

namespace App\Toggle;

use InvalidArgumentException;

class ToggleDecider
{
    public function __construct(
        private readonly array $toggles,
    ) {
    }

    public function decider(string $flag): bool
    {
        return $this->toggles[$flag] ?? throw new InvalidArgumentException(sprintf('Flag "%s" not found.', $flag));
    }
}
