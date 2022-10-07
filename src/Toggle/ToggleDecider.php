<?php

declare(strict_types=1);

namespace App\Toggle;

class ToggleDecider implements ToggleDeciderInterface
{
    public function __construct(
        private readonly array $toggles,
    ) {
    }

    public function decide(string $flag): ?bool
    {
        return $this->toggles[$flag] ?? null;
    }
}
