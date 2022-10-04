<?php

declare(strict_types=1);

namespace App\Clock\Model;

use DateInterval;
use DateTimeImmutable;

class Clock
{
    public function __construct(
        private DateTimeImmutable $time = new DateTimeImmutable(),
    ) {
    }

    public function time(): DateTimeImmutable
    {
        return $this->time;
    }

    public function advance(DateInterval $interval): void
    {
        $this->time = $this->time->add($interval);
    }

    public function goBack(DateInterval $interval): void
    {
        $this->time = $this->time->sub($interval);
    }
}
