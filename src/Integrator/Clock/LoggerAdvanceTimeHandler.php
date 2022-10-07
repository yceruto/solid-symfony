<?php

declare(strict_types=1);

namespace App\Integrator\Clock;

use App\Clock\Strategy\MoveTimeHandlerInterface;
use DateInterval;
use Psr\Log\LoggerInterface;

class LoggerAdvanceTimeHandler implements MoveTimeHandlerInterface
{
    public function __construct(
        private readonly MoveTimeHandlerInterface $decorated,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function move(DateInterval $interval): void
    {
        $this->decorated->move($interval);

        $this->logger->debug('The time machine is advancing in time.');
    }
}
