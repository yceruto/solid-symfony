<?php

declare(strict_types=1);

namespace App\Clock\Time\Local;

use App\Clock\Time\TimeInterface;
use DateTimeImmutable;

class LocalTime implements TimeInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
