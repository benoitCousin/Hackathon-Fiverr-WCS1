<?php

namespace App\Controller;

use App\Entity\Correction;
use App\Entity\Exercice;
use App\Entity\User;
use App\Repository\ChallengeRepository;
use App\Repository\CorrectionRepository;
use App\Repository\ExerciceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/done", name="profile_done")
     */
    public function showDoneChallenges(ChallengeRepository $challengeRepository, UserRepository $userRepository): Response
    {
        $users = $userRepository->findall();
        $challenges = $challengeRepository->findAll();

        return $this->render('profile/showDoneChallenges.html.twig', [
            'challenges' => $challenges,
            'users' => $users
        ]);
    }
    /**
     * @Route("/profile/pending", name="profile_pending")
     */
    public function showPendingChallenges(ChallengeRepository $challengeRepository, UserRepository $userRepository): Response
    {
        $users = $userRepository->findall();
        $challenges = $challengeRepository->findAll();

        return $this->render('profile/showPendingChallenges.html.twig', [
            'challenges' => $challenges,
            'users' => $users
        ]);
    }

    /**
     * @Route("/profile/show", name="profile_show")
     */
    public function show(UserRepository $userRepository): Response
    {
        $status = $userRepository->findAll();
        return $this->render('profile/show.html.twig', ['status' => $status]);
    }


}
