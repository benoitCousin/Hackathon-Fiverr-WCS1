<?php

    namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use symfony\component\HttpFoundation\Response;

   

class profileController extends AbstractController {

/**
     * @Route("/{user}", name="profile_show", methods={"GET"})
     */
    public function show(User $user ): Response
    {

        return $this->render('profile/show.html.twig', [
            'user' => $user,
            

        ]);
    }

}