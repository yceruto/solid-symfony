<?php

declare(strict_types=1);

namespace App\Twig;

use App\FeatureFlag\ToggleDecider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ToggleDeciderTwigExtension extends AbstractExtension
{
    public function __construct(
        private readonly ToggleDecider $toggleDecider
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('toggle_decider', [$this->toggleDecider, 'decider']),
        ];
    }
}
