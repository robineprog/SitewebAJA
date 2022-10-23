<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    /**
     * @Route("/contact/nous_contacter", name="nous_contacter")
     */
    public function nous_contacter(Request $request, MailerInterface $mailer)
    {   

        $form = $this->createForm(ContactType::class);

        $contact = $form->handleRequest($request);
        if(isset($_POST['raison']) && empty($_POST['raison'])){
        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('hugo.robine@gmail.com')
               ->subject('Contact siteweb AJA')
               ->htmlTemplate('emails/contact.html.twig')
               ->context([
                   'mail' => $contact->get('email')->getData(),
                   'sujet'=> $contact->get('sujet')->getData(),
                   'message'=> $contact->get('message')->getData()  
              ]);}

              $mailer->send($email);

              $this->addflash('message', 'Votre email a bien été envoyé');
              return $this->redirectToRoute('nous_contacter');

        }
        return $this->render('contact/nous_contacter.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'NousContacterController'
        ]);
    }
}
