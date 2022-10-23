<?php

namespace App\Controller;

use App\Entity\ArticlesBoutique;
use App\Form\BoutiqueContactType;
use App\Repository\ArticlesBoutiqueRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{
    /**
     * @Route("/boutique", name="boutique")
     */
    public function index()
    {
        return $this->render('boutique/index.html.twig', [
            'controller_name' => 'BoutiqueController',
        ]);
    }

        /**
     * @Route("/boutique/natation_eau_libre", name="natation_eau_libre")
     */
    public function natation_eau_libre(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(ArticlesBoutique::class)->findBy(["categorie"=>"Eau Libre"]); 

        $form = $this->createForm(BoutiqueContactType::class);
        
        $contact = $form->handleRequest($request);
    

        return $this->render('boutique/natation_eau_libre.html.twig', [
            'articles' => $articles,
            'form' => $form->createView()
        ]);
    }
 
        /**
     * @Route("/boutique/velo", name="velo")
     */
    public function velo(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(ArticlesBoutique::class)->findBy(["categorie"=>"Vélo"]);

        $form = $this->createForm(BoutiqueContactType::class);
        
        $contact = $form->handleRequest($request);

        return $this->render('boutique/velo.html.twig', [
            'articles' => $articles,
            'form' => $form->createView()
        ]);
    }
 
        /**
     * @Route("/boutique/course_a_pied", name="course_a_pied")
     */
    public function course_a_pied(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(ArticlesBoutique::class)->findBy(["categorie"=>"Course à pied"]);

        $form = $this->createForm(BoutiqueContactType::class);
        
        $contact = $form->handleRequest($request);

        return $this->render('boutique/course_a_pied.html.twig', [
            'articles' => $articles,
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/boutique/natation_eau_libre/details/{id}", name="details")
     */
    public function details($id, ArticlesBoutiqueRepository $annoncesRepo, Request $request, MailerInterface $mailer)
    {

        $annonce = $annoncesRepo->findOneBy(['id' => $id]);

        $form = $this->createForm(BoutiqueContactType::class);

        $contact = $form->handleRequest($request);
        if(isset($_POST['raison']) && empty($_POST['raison'])){
        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('hugo.robine@gmail.com')
               ->subject('Commande boutique siteweb AJA"' . $annonce->getTitre().'"')
               ->htmlTemplate('emails/contact_annonce.html.twig')
               ->context([
                   'annonce' => $annonce,
                   'mail' => $contact->get('email')->getData(),
                   'nom'=> $contact->get('nom')->getData(),
                   'prenom'=> $contact->get('prenom')->getData(),
                   'taille'=> $contact->get('taille')->getData(),
                   'message'=> $contact->get('message')->getData()  
              ]);}

              $mailer->send($email);

              $this->addflash('message', 'Votre email a bien été envoyé');
              return $this->redirectToRoute('details', ['id' => $annonce->getId()]);

        }


        return $this->render('boutique/details.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/boutique/velo/details/{id}", name="details1")
     */
    public function detailsvelo($id, ArticlesBoutiqueRepository $annoncesRepo, Request $request, MailerInterface $mailer)
    {

        $annonce = $annoncesRepo->findOneBy(['id' => $id]);

        $form = $this->createForm(BoutiqueContactType::class);

        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('emailaja.test@test')
               ->subject('Commande boutique siteweb AJA"' . $annonce->getTitre().'"')
               ->htmlTemplate('emails/contact_annonce.html.twig')
               ->context([
                   'annonce' => $annonce,
                   'mail' => $contact->get('email')->getData(),
                   'nom'=> $contact->get('nom')->getData(),
                   'prenom'=> $contact->get('prenom')->getData(),
                   'taille'=> $contact->get('taille')->getData(),
                   'message'=> $contact->get('message')->getData()  
              ]);

              $mailer->send($email);

              $this->addflash('message', 'Votre email a bien été envoyé');
              return $this->redirectToRoute('details', ['id' => $annonce->getId()]);

        }

        return $this->render('boutique/details.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/boutique/course_a_pied/details/{id}", name="details2")
     */
    public function detailscap($id, ArticlesBoutiqueRepository $annoncesRepo, Request $request, MailerInterface $mailer)
    {

        $annonce = $annoncesRepo->findOneBy(['id' => $id]);

        $form = $this->createForm(BoutiqueContactType::class);

        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('emailaja.test@test')
               ->subject('Commande boutique siteweb AJA"' . $annonce->getTitre().'"')
               ->htmlTemplate('emails/contact_annonce.html.twig')
               ->context([
                   'annonce' => $annonce,
                   'mail' => $contact->get('email')->getData(),
                   'nom'=> $contact->get('nom')->getData(),
                   'prenom'=> $contact->get('prenom')->getData(),
                   'taille'=> $contact->get('taille')->getData(),
                   'message'=> $contact->get('message')->getData()  
              ]);

              $mailer->send($email);

              $this->addflash('message', 'Votre email a bien été envoyé');
              return $this->redirectToRoute('details', ['id' => $annonce->getId()]);

        }

        return $this->render('boutique/details.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }






        /**
     * @Route("/boutique/petites_annonces", name="petites_annonces")
     */
    public function petites_annonces()
    {
        return $this->render('boutique/petites_annonces.html.twig', [
            'controller_name' => 'PetitesAnnoncesController',
        ]);
    }

        /**
     * @Route("/boutique/commander", name="commander")
     */
    public function commander()
    {
        return $this->render('boutique/commander.html.twig', [
            'controller_name' => 'CommanderController',
        ]);
    }
}
