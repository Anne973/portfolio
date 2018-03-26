<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 24/03/2018
 * Time: 21:35
 */
class luckyController extends Controller
{
    /**
    * @Route("/lucky/number")
    */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array('number'=>$number,));
    }
}