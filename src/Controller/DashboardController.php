<?php

namespace App\Controller;

use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/tableau-de-bord', name: 'app_dashboard')]
    public function index(AgentRepository $agentRepository): Response
    {
        $data = $agentRepository->getDiplomeCounts();

        // dd($data);

        $diplomes = array_column($data, 'diplome');
        $totals = array_column($data, 'count');

        return $this->render('dashboard/index.html.twig', [
            'diplomes' => $diplomes,
            'totals' => $totals,
        ]);
    }
}
