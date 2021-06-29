<?php

namespace App\Controller;

use App\Entity\Correction;
use App\Entity\Exercice;
use App\Entity\User;
use App\Repository\CorrectionRepository;
use App\Repository\ExerciceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile_index")
     */
    public function index(UserRepository $userRepository, CorrectionRepository $correctionRepository, ExerciceRepository $exerciceRepository): Response
    {   
        $users = $userRepository->findall();
        $corrections = $correctionRepository->findAll();
        $exercices = $exerciceRepository->findAll();
        return $this->render('profile/index.html.twig', [
            'correction'=> $corrections,
            'exercices' => $exercices,
            'users' => $users

        ]);
    }

    
}
