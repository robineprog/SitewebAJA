<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendaController extends AbstractController
{
    /**
     * @Route("/agenda", name="agenda")
     */
    public function index()
    {
        return $this->render('agenda/index.html.twig', [
            'controller_name' => 'AgendaController',
        ]);
    }

        /**
     * @Route("/agenda/regroupements", name="regroupements")
     */
    public function regroupements()
    {
        return $this->render('agenda/regroupements.html.twig', [
            'controller_name' => 'RegroupementsController',
        ]);
    }

        /**
     * @Route("/agenda/competitions", name="competitions")
     */
    public function competitions()
    {
        return $this->render('agenda/competitions.html.twig', [
            'controller_name' => 'CompetitionsController',
        ]);
    }

        /**
     * @Route("/agenda/anniversaires", name="anniversaires")
     */
    public function anniversaires()
    {
        return $this->render('agenda/anniversaires.html.twig', [
            'controller_name' => 'AnniversairesController',
        ]);
    }

        /**
     * @Route("/agenda/quifaitquoi", name="quifaitquoi")
     */
    public function quifaitquoi()
    {
        return $this->render('agenda/quifaitquoi.html.twig', [
            'controller_name' => 'QuiFaitQuoiController',
        ]);
    }
}
