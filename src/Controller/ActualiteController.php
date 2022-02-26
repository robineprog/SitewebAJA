<?php

namespace App\Controller;

use App\Entity\ArticlesBoutique;
use App\Entity\ArticlesPress;
use App\Repository\ArticlesPressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function index()
    {
        return $this->render('actualite/index.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }

    /**
     * @Route("/actualite/bureau", name="bureau1")
     */
    public function bureau1()
    {

        $articles = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"bureau"],['created_at' => 'desc']);
        return $this->render('actualite/bureau.html.twig', [
            'articles' => $articles,
        ]);
    }

        /**
     * @Route("/actualite/boutique", name="boutique1")
     */
    public function boutique()
    {
        $articles2 = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"boutique"],['created_at' => 'desc']);
        return $this->render('actualite/boutique.html.twig', [
            'articles2' => $articles2,
        ]);
    }

        /**
     * @Route("/actualite/sport", name="sport1")
     */
    public function sport()
    {
        $articles3 = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"sport"],['created_at' => 'desc']);
        return $this->render('actualite/sport.html.twig', [
            'articles3' => $articles3,
        ]);
    }
}
