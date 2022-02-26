<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartenairesController extends AbstractController
{
    /**
     * @Route("/partenaires", name="partenaires")
     */
    public function index()
    {
        return $this->render('partenaires/index.html.twig', [
            'controller_name' => 'PartenairesController',
        ]);
    }

      /**
     * @Route("/partenaires/institutionnels", name="institutionnels")
     */
    public function institutionnels()
    {
        return $this->render('partenaires/institutionnels.html.twig', [
            'controller_name' => 'InstitutionnelsController',
        ]);
    }

      /**
     * @Route("/partenaires/prives", name="prives")
     */
    public function prives()
    {
        return $this->render('partenaires/prives.html.twig', [
            'controller_name' => 'PrivesController',
        ]);
    }

      /**
     * @Route("/partenaires/devenir_partenaire", name="devenir_partenaire")
     */
    public function devenir_partenaire()
    {
        return $this->render('partenaires/devenir_partenaire.html.twig', [
            'controller_name' => 'DevenirPartenaireController',
        ]);
    }
}
