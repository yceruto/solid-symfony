<?php

declare(strict_types=1);

namespace App\Controller\Clock;

use App\Clock\ClockService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring/clock', name: 'app_show_clock')]
class ShowClock extends AbstractController
{
    public function __construct(
        private readonly ClockService $clockService,
    ) {
    }

    public function __invoke(): Response
    {
        $time = $this->clockService->time();

        return $this->render('clock/show.html.twig', [
            'time' => $time,
        ]);
    }
}
