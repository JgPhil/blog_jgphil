<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager, MailerInterface $mailer): Response
    {
        $contact = new Contact;

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $manager->persist($contact);

            $email = (new Email())
                ->from('contact@philippe-j.fr')
                ->to('contact@philippe-j.fr')
                ->subject('Nouveau contact #' . $contact->getId() . ' - ' . $contact->getEmail())
                ->html('l\'utilisateur ' .
                    $contact->getFirstname() .
                    ' ' . $contact->getLastname() .
                    ' <br>' . 'adresse email: ' .
                    $contact->getEmail() .
                    '  <br>' . 'vous a contacté le ' .
                    $contact->getCreatedAt()->format('Y-m-d') .
                    '  à ' . $contact->getCreatedAt()->format('H:m:i') .
                    '.<br><br> Message : <br>' .
                    $contact->getContent());
            $mailer->send($email);
            $manager->flush();

            $this->addFlash('message', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('home');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
