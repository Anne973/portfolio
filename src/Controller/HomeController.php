<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
    * @Route("/", name="homepage")
    */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if($form ->isSubmitted() && $form->isValid()){
            $data=$form->getData();

            /*$message= (new \Swift_Message('Contact to ADWEB973'))
            ->setFrom($data['email'])
            ->setTo('anne.derenoncourt@gmail.com')
            ->setBody(
                $this->renderView(
                    'Emails/contact.html.twig',
                    array('data' => $data)
                ),
                'text/html'
            );
            $mailer->send($message);*/
            $to='anne.derenoncourt@gmail.com';
            $subject=$data['subject'];
            $message='<html><p>'.$data['message'].'</p><p>De : '.$data['name'].'</p><p>Email : '.$data['email'].'</p></html>';
            $headers = 'MIME-Version:1.0' . "\r\n";
            $headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
            mail($to, $subject, $message, $headers);

            $this->addFlash('notice', 'Votre message a été envoyé. Merci!');
            return $this->redirectToRoute('homepage');

        }
        return $this->render('home/home.html.twig', array('form' => $form->createView()));
    }
}