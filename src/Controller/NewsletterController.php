<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\NewsletterType;
use App\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        
        $em = $this->getDoctrine()->getManagerForClass(Newsletter::class);
        $em -> persist($newsletter);
        $em -> flush();
        
        return $this->json($newsletter->getEmail());        
    }
    
    /**
     * @Route("newsletter/delete/{id}", requirements={"id" = "\d+"})
     */
    
    public function deleteNewsletter(Request $request, $id) {
        $newsletter = $this->getDoctrine()->getRepository(Newsletter::class)->find($id);
        
        $em = $this->getDoctrine()->getManagerForClass(Newsletter::class);
        $em->remove($newsletter);
        $em->flush();
        
        return new Response("Deleted");
    }
    
}