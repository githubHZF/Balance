<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // if ($this->getUser()) {
        //     return $this->redirectToRoute('navbar');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    #[Route(path: '/registre', name: 'app_registre')]
    public function registre(UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine)
    {

        $user = new User();
        $user->setUsername("Nisrine ");
        $user->setPassword($passwordHasher->hashPassword(
            $user,
            "123456"
        ));
        $user->setRoles(['ROLE_ADMIN']);

        $doctrine->getManager()->persist($user);
        $doctrine->getManager()->flush();

        // if ($this->getUser()) {
        //     return $this->redirectToRoute('navbar');
        // }

        return new JsonResponse('good');

        // $user = new User();
        // $user->setUsername("admin");
        // $user->setPassword($passwordHasher->hashPassword(
        //     $user,
        //     "0123456789"
        // ));
        // $user->setRoles(['ROLE_ADMIN']);

        // $doctrine->getManager()->persist($user);
        // $doctrine->getManager()->flush();

        // return new JsonResponse('good');
        
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
