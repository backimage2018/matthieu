<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\NewsletterType;
use App\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends Controller
{
    /**
     * @Route("/newsletter")
     */
    
    public function inscriptionNewsletter(Request $request)
    {
        
        $email = $request -> request -> get('email');
        
        $newsletter = new Newsletter();
        $newsletter -> setEmail($email);
        
        $em = $this->getDoctrine()->getManager();
        $em -> persist($newsletter);
        $em -> flush();
        
        return $this->json($newsletter->getEmail());        
    }
    
}