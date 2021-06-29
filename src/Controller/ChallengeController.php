<?php

    namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use symfony\component\HttpFoundation\Response;

    /**
     * @Route("/Challenge", name="Challenge_")
     */
    class ChallengeController extends AbstractController
    {
        /**
         * @Route("/", name="index")
         */
        public function index(): Response
        {
            return $this->render('Challenge/index.html.twig');
        }
    }

