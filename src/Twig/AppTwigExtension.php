<?php

declare(strict_types=1);

namespace App\Twig;

use App\Toggle\ToggleDeciderInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension
{
    public function __construct(
        private readonly ToggleDeciderInterface $toggleDecider
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('toggle_decider', [$this->toggleDecider, 'decide']),
        ];
    }
}
