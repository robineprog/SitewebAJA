<?php

namespace App\Controller;

use App\Form\InscriptionType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index()
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

      /**
     * @Route("/inscription/livret", name="livret")
     */
    public function livret()
    {
        return $this->render('inscription/livret.html.twig', [
            'controller_name' => 'LivretController',
        ]);
    }

      /**
     * @Route("/inscription/reglement", name="reglement")
     */
    public function reglement()
    {
        return $this->render('inscription/reglement.html.twig', [
            'controller_name' => 'ReglementController',
        ]);
    }

      /**
     * @Route("/inscription/pass", name="pass")
     */
    public function pass()
    {
        return $this->render('inscription/pass.html.twig', [
            'controller_name' => 'PassController',
        ]);
    }

      /**
     * @Route("/inscription/inscrivez_vous", name="inscrivez_vous")
     */
    public function inscrivez_vous()
    {
        return $this->render('inscription/inscrivez_vous.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }

        /**
     * @Route("/inscription/inscrivez_vous/étape_1", name="inscrivez_vous1")
     */
    public function inscrivez_vous1( Request $request, MailerInterface $mailer)
    {

        $form = $this->createForm(InscriptionType::class);

        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('emailaja.test@test')
               ->subject('Demande de livret du siteweb AJA')
               ->htmlTemplate('emails/inscription.html.twig')
               ->context([
                   'mail' => $contact->get('email')->getData(),

                ]);

                $mailer->send($email);
  
                $this->addflash('message', 'Votre email a bien été envoyé');
                return $this->redirectToRoute('inscrivez_vous2');
            }


        return $this->render('inscription/inscrivez_vous1.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'InscrivezVousController',
        ]);
    }

        /**
     * @Route("/inscription/inscrivez_vous/étape_2", name="inscrivez_vous2")
     */
    public function inscrivez_vous2()
    {
        return $this->render('inscription/inscrivez_vous2.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }

        /**
     * @Route("/inscription/inscrivez_vous/étape_3", name="inscrivez_vous3")
     */
    public function inscrivez_vous3()
    {
        return $this->render('inscription/inscrivez_vous3.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }

        /**
     * @Route("/inscription/inscrivez_vous/étape_4", name="inscrivez_vous4")
     */
    public function inscrivez_vous4()
    {
        return $this->render('inscription/inscrivez_vous4.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }

        /**
     * @Route("/inscription/inscrivez_vous/étape_5", name="inscrivez_vous5")
     */
    public function inscrivez_vous5()
    {
        return $this->render('inscription/inscrivez_vous5.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }

            /**
     * @Route("/inscription/tarifs", name="tarifs")
     */
    public function tarifs()
    {
        return $this->render('inscription/tarifs.html.twig', [
            'controller_name' => 'InscrivezVousController',
        ]);
    }
    
}
