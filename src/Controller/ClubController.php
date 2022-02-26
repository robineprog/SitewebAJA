<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index()
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    /**
     * @Route("/club/historique", name="historique")
     */

    public function historique()
    {
        return $this->render('club/historique.html.twig', [
            'controller_name' => 'HistoriqueController',
        ]);
    }

        /**
     * @Route("/club/chiffres_clefs", name="chiffres_clefs")
     */
    public function chiffresclefs()
    {
        return $this->render('club/chiffresclefs.html.twig', [
            'controller_name' => 'ChiffresClefsController',
        ]);
    }

        /**
     * @Route("/club/equipe", name="equipe")
     */
    public function equipe()
    {
        return $this->render('club/equipe.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

        /**
     * @Route("/club/bureau", name="bureau")
     */
    public function bureau()
    {
        return $this->render('club/bureau.html.twig', [
            'controller_name' => 'BureauController',
        ]);
    }

        /**
     * @Route("/club/organisations", name="organisations")
     */
    public function organisations()
    {
        return $this->render('club/organisations.html.twig', [
            'controller_name' => 'OrganisationsController',
        ]);
    }

        /**
     * @Route("/club/arbitrage", name="arbitrage")
     */
    public function arbitrage()
    {
        return $this->render('club/arbitrage.html.twig', [
            'controller_name' => 'ArbitrageController',
        ]);
    }
}
