<?php

declare(strict_types=1);

namespace App\Clock\Time;

use DateTimeImmutable;

interface TimeInterface
{
    public function now(): DateTimeImmutable;
}
