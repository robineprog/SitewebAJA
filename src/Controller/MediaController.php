<?php

namespace App\Controller;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MediaController extends AbstractController
{
    /**
     * @Route("/media", name="media")
     */
    public function index()
    {
        return $this->render('media/index.html.twig', [
            'controller_name' => 'MediaController',
        ]);
    }


     /**
     * @Route("/media/photo", name="photo")
     */
    public function photo(Request $request)
    {

        $media = $this->getDoctrine()->getRepository(Media::class)->findBy(["categorie"=>"Photos"]);
        return $this->render('media/photo.html.twig', [
            'media' => $media,
        ]);
    }  
         /**
     * @Route("/media/photo/details/{id}", name="details")
     */
    public function details($id, MediaRepository $mediarepo, Request $request)
    {

        $media = $mediarepo->findOneBy(['id' => $id]);


        return $this->render('media/details.html.twig', [
            'media' => $media,
        ]);
    }

     /**
     * @Route("/media/video", name="video")
     */
    public function video()
    {
        $media2 = $this->getDoctrine()->getRepository(Media::class)->findBy(["categorie"=>"Vidéo"]);
        return $this->render('media/video.html.twig', [
            'media2' => $media2,
        ]);
    } 
     /**
     * @Route("/media/press", name="press")
     */
    public function press()
    {
        $media3 = $this->getDoctrine()->getRepository(Media::class)->findBy(["categorie"=>"Documents"]);
        return $this->render('media/press.html.twig', [
            'media3' => $media3,
        ]);

    }
}
