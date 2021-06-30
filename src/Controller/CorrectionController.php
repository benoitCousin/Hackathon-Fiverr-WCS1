<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\Routing\Annotation\Route;
    /**
     * @route("/correction", name="correction_")
     */
class CorrectionController extends AbstractController{
    /**
     * @route("/", name="correction_com")
     */
    public function index(): Response
    {
        return $this->render('correction/index.html.twig');
    }
}