<?php

declare(strict_types=1);

namespace App\Clock\Time\World;

use App\Clock\Time\TimeInterface;
use DateTimeImmutable;
use RuntimeException;

class WorldTime implements TimeInterface
{
    public function now(): DateTimeImmutable
    {
        $response = file_get_contents('https://worldtimeapi.org/api/timezone/Europe/Paris');

        if (false === $response) {
            throw new RuntimeException('World time endpoint is broken');
        }

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (!isset($data['datetime'])) {
            throw new RuntimeException('World time response format is broken');
        }

        return new DateTimeImmutable($data['datetime']);
    }
}
