<?php

declare(strict_types=1);

namespace App\Clock;

use DateInterval;
use DateTimeImmutable;
use Psr\Cache\CacheItemPoolInterface;

class TimeMachine
{
    public function __construct(
        private readonly CacheItemPoolInterface $cache,
        private readonly string $env,
    ) {
    }

    public function time(): DateTimeImmutable
    {
        if ('prod' === $this->env) {
            return new DateTimeImmutable();
        }

        return $this->cache->get('clock', static fn () => new DateTimeImmutable());
    }

    public function advance(DateInterval $interval): void
    {
        if ('prod' === $this->env) {
            return;
        }

        $cacheItem = $this->cache->getItem('clock');
        $clock = $cacheItem->get() ?? new DateTimeImmutable();
        $cacheItem->set($clock->add($interval));

        $this->cache->save($cacheItem);
    }

    public function goBack(DateInterval $interval): void
    {
        if ('prod' === $this->env) {
            return;
        }

        $cacheItem = $this->cache->getItem('clock');
        $clock = $cacheItem->get() ?? new DateTimeImmutable();
        $cacheItem->set($clock->sub($interval));

        $this->cache->save($cacheItem);
    }

    public function reset(): void
    {
        if ('prod' === $this->env) {
            return;
        }

        $this->cache->deleteItem('clock');
    }
}
