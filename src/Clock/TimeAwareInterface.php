<?php

declare(strict_types=1);

namespace App\Clock;

use DateTimeImmutable;

interface TimeAwareInterface
{
    public function time(): DateTimeImmutable;
}
