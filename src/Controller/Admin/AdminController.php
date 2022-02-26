<?php

namespace App\Controller\Admin;

use App\Entity\ArticlesBoutique;
use App\Entity\ArticlesPress;
use App\Entity\BoutiqueImages;
use App\Entity\CategorieArticlesBoutique;
use App\Entity\CategorieArticlesPress;
use App\Entity\CategorieMedia;
use App\Entity\Media;
use App\Entity\MediaImages;
use App\Entity\PressImages;
use App\Form\ArticlesBoutiqueType;
use App\Form\ArticlesPressType;
use App\Form\CategorieArticlesBoutiqueType;
use App\Form\CategorieArticlesPressType;
use App\Form\CategorieMediaType;
use App\Form\MediaType;
use App\Repository\ArticlesBoutiqueRepository;
use App\Repository\ArticlesPressRepository;
use App\Repository\CategorieArticlesBoutiqueRepository;
use App\Repository\CategorieArticlesPressRepository;
use App\Repository\CategorieMediaRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin", name="admin_")
 * @package App\Controller\Admin
 */

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }



    /**
     * @Route("/actualités", name="actualités")
     */
    public function actualités(ArticlesPressRepository $actualitésRepo)
    {
        return $this->render('admin/actualités/actualités.html.twig', [
            'actualités' => $actualitésRepo->findAll()
        ]);
    }

    /**
     * @Route("/actualités/ajout", name="actualités_ajout")
     */
    public function ajoutActualités(Request $request)
    {
        $actualités = new ArticlesPress;

        $form = $this->createForm(ArticlesPressType::class, $actualités);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $images = $form->get('images')->getData();

            foreach($images as $image){

                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                $img = new PressImages();
                $img->setName($fichier);
                $actualités->addImage($img);    


            }
  
            $em = $this->getDoctrine()->getManager();
            $em->persist($actualités);
            $em->flush();

            return $this->redirectToRoute('admin_actualités');

        }


        return $this->render('admin/actualités/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }



    /**
 * @Route("/actualités/modifier/{id}", name="actualités_modifier")
 */
public function ModifActualités(ArticlesPress $actualités, Request $request)
{
    $form = $this->createForm(ArticlesPressType::class, $actualités);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        $images = $form->get('images')->getData();

        foreach($images as $image){

            $fichier = md5(uniqid()).'.'.$image->guessExtension();

            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );

            $img = new PressImages();
            $img->setName($fichier);
            $actualités->addImage($img);    


        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($actualités);
        $em->flush();

        return $this->redirectToRoute('admin_actualités');
    }

    return $this->render('admin/actualités/ajout.html.twig', [
        'form' => $form->createView(),
        'actualités' => $actualités
    ]);
}

    /**
 * @Route("/actualités/supprimer/{id}", name="actualités_supprimer")
 */
public function supprimerActualités(ArticlesPress $actualités)
{
        $em = $this->getDoctrine()->getManager();
        $em->remove($actualités);
        $em->flush();


        $this->addFlash('message', 'Article supprimé avec succès');
        return $this->redirectToRoute('admin_actualités');
    
    }
/**
 * @Route("/actualités/supprimer/images/{id}", name="actualités_supprimer_images", methods={"DELETE"})
 */
    public function supprimerImages(PressImages $image, Request $request){

        $data = json_decode($request->getContent(), true);
        if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
            $nom = $image->getName();
            unlink($this->getParameter('images_directory').'/'.$nom);

            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();

            return new JsonResponse(['succes' => 1]);
        }else{
            return new JsonResponse(['error' => 'token invalide'], 400);
            

        }

    }





    /**
     * @Route("/boutique", name="boutique")
     */
    public function boutique(ArticlesBoutiqueRepository $boutiqueRepo)
    {
        return $this->render('admin/boutique/boutique.html.twig', [
            'boutiques' => $boutiqueRepo->findAll()
        ]);
    }

    /**
     * @Route("/boutique/ajout", name="boutique_ajout")
     */
    public function ajoutBoutique(Request $request)
    {
        $boutique = new ArticlesBoutique;

        $form = $this->createForm(ArticlesBoutiqueType::class, $boutique);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $images = $form->get('images')->getData();

            foreach($images as $image){

                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                $img = new BoutiqueImages();
                $img->setName($fichier);
                $boutique->addImage($img);    


            }
  
            $em = $this->getDoctrine()->getManager();
            $em->persist($boutique);
            $em->flush();

            return $this->redirectToRoute('admin_boutique');

        }


        return $this->render('admin/boutique/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }


        /**
 * @Route("/boutique/modifier/{id}", name="boutique_modifier")
 */
public function ModifBoutique(ArticlesBoutique $boutique, Request $request)
{
    $form = $this->createForm(ArticlesBoutiqueType::class, $boutique);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        $images = $form->get('images')->getData();

        foreach($images as $image){

            $fichier = md5(uniqid()).'.'.$image->guessExtension();

            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );

            $img = new BoutiqueImages();
            $img->setName($fichier);
            $boutique->addImage($img);    


        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($boutique);
        $em->flush();

        return $this->redirectToRoute('admin_boutique');
    }

    return $this->render('admin/boutique/ajout.html.twig', [
        'form' => $form->createView(),
        'boutique' => $boutique
    ]);
}


    /**
 * @Route("/boutique/supprimer/{id}", name="boutique_supprimer")
 */
public function supprimerBoutique(ArticlesBoutique $boutique)
{
        $em = $this->getDoctrine()->getManager();
        $em->remove($boutique);
        $em->flush();


        $this->addFlash('message', 'Article supprimé avec succès');
        return $this->redirectToRoute('admin_boutique');
    }

/**
 * @Route("/boutique/supprimer/images/{id}", name="boutique_supprimer_images", methods={"DELETE"})
 */
public function supprimerImagesBoutique(BoutiqueImages $image, Request $request){

    $data = json_decode($request->getContent(), true);
    if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
        $nom = $image->getName();
        unlink($this->getParameter('images_directory').'/'.$nom);

        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        return new JsonResponse(['succes' => 1]);
    }else{
        return new JsonResponse(['error' => 'token invalide'], 400);
        

    }

}



    /**
     * @Route("/media", name="media")
     */
    public function media(MediaRepository $mediaRepo)
    {
        return $this->render('admin/media/media.html.twig', [
            'medias' => $mediaRepo->findAll()
        ]);
    }


        /**
     * @Route("/media/ajout", name="media_ajout")
     */
    public function ajoutMedia(Request $request)
    {
        $media = new Media;

        $form = $this->createForm(MediaType::class, $media);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $images = $form->get('images')->getData();
    
            foreach($images as $image){
    
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
    
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
    
                $img = new MediaImages();
                $img->setName($fichier);
                $media->addImage($img);    
    
    
            }
    
            $em = $this->getDoctrine()->getManager();
            $em->persist($media);
            $em->flush();

            return $this->redirectToRoute('admin_media');

        }


        return $this->render('admin/media/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/media/modifier/{id}", name="media_modifier")
     */
    public function ModifMedia(Media $media, Request $request)
    {
        $form = $this->createForm(MediaType::class, $media);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $images = $form->get('images')->getData();
    
            foreach($images as $image){
    
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
    
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
    
                $img = new MediaImages();
                $img->setName($fichier);
                $media->addImage($img);    
    
    
            }
    
            $em = $this->getDoctrine()->getManager();
            $em->persist($media);
            $em->flush();

            return $this->redirectToRoute('admin_media');
        }

        return $this->render('admin/media/ajout.html.twig', [
            'form' => $form->createView(),
            'media' => $media
        ]);
    }

        /**
 * @Route("/media/supprimer/{id}", name="media_supprimer")
 */
public function supprimerMedia(Media $media)
{
        $em = $this->getDoctrine()->getManager();
        $em->remove($media);
        $em->flush();


        $this->addFlash('message', 'Article supprimé avec succès');
        return $this->redirectToRoute('admin_media');
    }

/**
 * @Route("/media/supprimer/images/{id}", name="media_supprimer_images", methods={"DELETE"})
 */
public function supprimerImagesMedia(MediaImages $image, Request $request){
    $data = json_decode($request->getContent(), true);
    if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
        $nom = $image->getName();
        unlink($this->getParameter('images_directory').'/'.$nom);

        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        return new JsonResponse(['succes' => 1]);
    }else{
        return new JsonResponse(['error' => 'token invalide'], 400);
        

    }
}

}