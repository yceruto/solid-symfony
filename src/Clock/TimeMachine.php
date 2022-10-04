<?php

declare(strict_types=1);

namespace App\Clock;

use App\Clock\Storage\ClockStorageInterface;
use DateInterval;
use DateTimeImmutable;

/**
 * SRP:
 *  - TimeMachine (Service)
 *  - Model (Clock)
 *  - Storage (Cache)
 * OPS:
 *  - Environment -> Storage Adapters (Cache, Null)
 * LSP:
 *  - ~
 * DIP:
 *  - TimeMachineInterface
 *  - ClockStorageInterface
 *  - CacheItemPoolInterface
 * ISP:
 *  - TimeAwareInterface
 *  - TimeHandlerInterface
 *  - TimeResetterInterface
 */
class TimeMachine implements TimeMachineInterface
{
    public function __construct(
        private readonly ClockStorageInterface $storage,
    ) {
    }

    public function time(): DateTimeImmutable
    {
        return $this->storage->load()->time();
    }

    public function advance(DateInterval $interval): void
    {
        $clock = $this->storage->load();
        $clock->advance($interval);
        $this->storage->save($clock);
    }

    public function goBack(DateInterval $interval): void
    {
        $clock = $this->storage->load();
        $clock->goBack($interval);
        $this->storage->save($clock);
    }

    public function reset(): void
    {
        $this->storage->clear();
    }
}
