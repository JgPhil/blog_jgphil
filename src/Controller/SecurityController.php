<?php

namespace App\Controller;

use App\Entity\User;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        /* $me = new User();
        $me->setEmail("jamingph@gmail.com")
            ->setFirstname("Philippe")
            ->setLastname("Jaming")
            ->setPassions(["Famille", "Informatique", "Sport"])
            ->setPassword(password_hash("C@ch@b3ll3", PASSWORD_BCRYPT))
            ->setRoles(["ROLE_ADMIN"])
            ->setBirthdate(new DateTime("1980/11/05"));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($me);
        $entityManager->flush();
 */

        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
