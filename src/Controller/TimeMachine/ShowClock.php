<?php

declare(strict_types=1);

namespace App\Controller\TimeMachine;

use App\Clock\TimeAwareInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/refactoring-legacy/time-machine', name: 'app_show_clock')]
class ShowClock extends AbstractController
{
    public function __construct(
        private readonly TimeAwareInterface $timeMachine,
    ) {
    }

    public function __invoke(): Response
    {
        $time = $this->timeMachine->time();

        return $this->render('time_machine/show.html.twig', [
            'time' => $time,
        ]);
    }
}
