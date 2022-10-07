<?php

declare(strict_types=1);

namespace App\Clock\Strategy;

use DateInterval;

class NullTimeHandler implements MoveTimeHandlerInterface
{
    public function move(DateInterval $interval): void
    {
        // do nothing.
    }
}
