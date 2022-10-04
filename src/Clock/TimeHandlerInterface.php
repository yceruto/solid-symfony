<?php

declare(strict_types=1);

namespace App\Clock;

use DateInterval;

interface TimeHandlerInterface
{
    public function advance(DateInterval $interval): void;

    public function goBack(DateInterval $interval): void;
}
