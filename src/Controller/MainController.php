<?php

namespace App\Controller;

use App\Entity\ArticlesPress;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {

        $articles = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"bureau"],['created_at' => 'desc'], 1);
        $articles2 = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"sport"],['created_at' => 'desc'], 1);
        $articles3 = $this->getDoctrine()->getRepository(ArticlesPress::class)->findBy(["categorie"=>"boutique"],['created_at' => 'desc'], 1);
        return $this->render('main/index.html.twig', [
            'articles' => $articles,
            'articles2' => $articles2,
            'articles3' => $articles3,
        ]);

        

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
}
