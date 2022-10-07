<?php

declare(strict_types=1);

namespace App\Clock\Strategy;

use DateInterval;

interface MoveTimeHandlerInterface
{
    public function move(DateInterval $interval): void;
}
