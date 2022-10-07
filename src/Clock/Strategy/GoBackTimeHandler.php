<?php

declare(strict_types=1);

namespace App\Clock\Strategy;

use App\Clock\TimeHandlerInterface;
use DateInterval;

class GoBackTimeHandler implements MoveTimeHandlerInterface
{
    public function __construct(
        private readonly TimeHandlerInterface $timeMachine,
    ) {
    }

    public function move(DateInterval $interval): void
    {
        // do something more
        // and more

        $this->timeMachine->goBack($interval);
    }
}
