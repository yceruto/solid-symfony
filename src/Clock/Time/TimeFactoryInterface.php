<?php

declare(strict_types=1);

namespace App\Clock\Time;

interface TimeFactoryInterface
{
    public function supports(string $name): bool;

    public function create(string $name): TimeInterface;
}
