<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 24/03/2018
 * Time: 21:35
 */
class HomeController extends Controller
{
    /**
    * @Route("/")
    */
    public function index()
    {

        return $this->render('home/home.html.twig');
    }
}