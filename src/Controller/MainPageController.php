<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    /**
     * @Route("/main/page", name="main_page")
     */
    public function index()
    {
        $number = random_int(0, 100);
        
        return $this->render('main_page/index.html.twig', [
            'controller_name' => 'MainPageController',
            'number' => $number
        ]);
    }
}
