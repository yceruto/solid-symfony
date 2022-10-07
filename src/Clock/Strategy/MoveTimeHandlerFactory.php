<?php

declare(strict_types=1);

namespace App\Clock\Strategy;

use App\Toggle\ToggleDeciderInterface;

class MoveTimeHandlerFactory
{
    public function __construct(
        private readonly ToggleDeciderInterface $toggleDecider,
        private readonly MoveTimeHandlerInterface $advanceTimeHandler,
        private readonly MoveTimeHandlerInterface $goBackTimeHandler,
        private readonly MoveTimeHandlerInterface $nullTimeHandler,
    ) {
    }

    public function __invoke(): MoveTimeHandlerInterface
    {
        $decide = $this->toggleDecider->decide('invert_time_machine');

        if (null === $decide) {
            return $this->nullTimeHandler;
        }

        if (true === $decide) {
            return $this->goBackTimeHandler;
        }

        return $this->advanceTimeHandler;
    }
}
