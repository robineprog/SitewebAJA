<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="activite")
     */
    public function index()
    {
        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
        ]);
    }

        /**
     * @Route("/activite/triathlon_&_sports_enchaines", name="triathlon_sports_enchaines")
     */
    public function triathlon_sports_enchaines()
    {
        return $this->render('activite/triathlon_sports_enchaines.html.twig', [
            'controller_name' => 'TriathlonSportsEnchainesController',
        ]);
    }

        /**
     * @Route("/activite/entrainements", name="entrainements")
     */
    public function entrainements()
    {
        return $this->render('activite/entrainements.html.twig', [
            'controller_name' => 'EntrainementsController',
        ]);
    }

        /**
     * @Route("/activite/equipements", name="equipements")
     */
    public function equipements()
    {
        return $this->render('activite/equipements.html.twig', [
            'controller_name' => 'EquipementsController',
        ]);
    }

        /**
     * @Route("/activite/sections", name="sections")
     */
    public function sections()
    {
        return $this->render('activite/sections/index.html.twig', [
            'controller_name' => 'SectionsController',
        ]);
    }

        /**
     * @Route("/activite/sections/ecole_de_triathlon", name="ecole_de_triathlon")
     */
    public function ecole_de_triathlon()
    {
        return $this->render('activite/sections/ecole_de_triathlon.html.twig', [
            'controller_name' => 'EcoleDeTriathlonController',
        ]);
    }

        /**
     * @Route("/activite/sections/loisir", name="loisir")
     */
    public function loisir()
    {
        return $this->render('activite/sections/loisir.html.twig', [
            'controller_name' => 'LoisirController',
        ]);
    }

        /**
     * @Route("/activite/sections/competition", name="competition")
     */
    public function competition()
    {
        return $this->render('activite/sections/competition.html.twig', [
            'controller_name' => 'CompetitionController',
        ]);
    }
}
