<?php

declare(strict_types=1);

namespace App\Clock\Storage;

use App\Clock\Model\Clock;
use Psr\Cache\CacheItemPoolInterface;

class CacheClockStorage implements ClockStorageInterface
{
    private const KEY = 'clock';

    public function __construct(
        private readonly CacheItemPoolInterface $cache,
    ) {
    }

    public function load(): Clock
    {
        return $this->cache->get(self::KEY, static fn () => new Clock());
    }

    public function save(Clock $clock): void
    {
        $this->cache->save($this->cache->getItem(self::KEY)->set($clock));
    }

    public function clear(): void
    {
        $this->cache->deleteItem(self::KEY);
    }
}
