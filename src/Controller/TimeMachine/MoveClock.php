<?php

declare(strict_types=1);

namespace App\Controller\TimeMachine;

use App\Clock\TimeHandlerInterface;
use App\Toggle\ToggleDeciderInterface;
use DateInterval;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring/clock/move', name: 'app_move_clock')]
class MoveClock extends AbstractController
{
    public function __construct(
        private readonly TimeHandlerInterface $timeMachine,
        private readonly ToggleDeciderInterface $toggleDecider,
    ) {
    }

    public function __invoke(): RedirectResponse
    {
        $interval = new DateInterval('PT1M');

        if ($this->toggleDecider->decider('invert_time_machine')) {
            $this->timeMachine->goBack($interval);
        } else {
            $this->timeMachine->advance($interval);
        }

        return $this->redirectToRoute('app_show_clock');
    }
}
