<?php

declare(strict_types=1);

namespace App\Controller\TimeMachine;

use App\Clock\TimeMachine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring/clock/reset', name: 'app_reset_clock')]
class ResetClock extends AbstractController
{
    public function __construct(
        private readonly TimeMachine $timeMachine,
    ) {
    }

    public function __invoke(): RedirectResponse
    {
        $this->timeMachine->reset();

        return $this->redirectToRoute('app_show_clock');
    }
}
