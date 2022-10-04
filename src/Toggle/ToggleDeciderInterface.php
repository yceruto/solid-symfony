<?php

declare(strict_types=1);

namespace App\Toggle;

interface ToggleDeciderInterface
{
    public function decider(string $flag): bool;
}
