<?php

declare(strict_types=1);

namespace App\Controller\TimeMachine;

use App\Clock\Strategy\MoveTimeHandlerInterface;
use DateInterval;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring/clock/move', name: 'app_move_clock')]
class MoveClock extends AbstractController
{
    public function __construct(
        private readonly MoveTimeHandlerInterface $timeMachine,
    ) {
    }

    public function __invoke(): RedirectResponse
    {
        $interval = new DateInterval('PT1M');

        $this->timeMachine->move($interval);

        return $this->redirectToRoute('app_show_clock');
    }
}
