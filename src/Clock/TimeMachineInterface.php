<?php

declare(strict_types=1);

namespace App\Clock;

interface TimeMachineInterface extends TimeAwareInterface, TimeHandlerInterface, TimeResetterInterface
{
}
