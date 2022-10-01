<?php

declare(strict_types=1);

namespace App\Controller\Clock;

use App\Clock\TimeMachine;
use DateInterval;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring/clock/advance', name: 'app_advance_clock')]
class AdvanceClock extends AbstractController
{
    public function __construct(
        private readonly TimeMachine $timeMachine,
    ) {
    }

    public function __invoke(): RedirectResponse
    {
        $this->timeMachine->advance(new DateInterval('PT1M'));

        return $this->redirectToRoute('app_show_clock');
    }
}
