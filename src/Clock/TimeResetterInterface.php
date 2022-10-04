<?php

declare(strict_types=1);

namespace App\Clock;

interface TimeResetterInterface
{
    public function reset(): void;
}
