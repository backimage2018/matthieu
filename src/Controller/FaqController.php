<?php
namespace App\Controller;

use App\Form\FaqType;
use App\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends Controller
{
    /**
     * @Route("/admin/faq", name="admin_faq")
     */

    public function registerFaq(Request $request)
    {
        $faq = new Faq();
        $form = $this->createForm(FaqType::class, $faq);
        $faqComplete = $this-> getDoctrine()-> getRepository(Faq::class)->findAll();
        $form->handleRequest($request);
        
        if ($form-> isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faq);
            $em->flush();
            
            return $this->redirectToRoute('admin_faq');
        }
        
        return $this->render('admin/faq.html.twig', ['form' => $form->createView(),'faqComplete' => $faqComplete]);
    }
    
    /**
     * @Route("/faq", name="faq")
     */
    
    function faqs() {
        
        $faqComplete = $this->getDoctrine()->getRepository(Faq::class)->findAll();
        
        return $this->render('faq.html.twig', [
            'faqComplete' => $faqComplete,
            'langues' => json_decode(Data::langues),
            'moneys' => json_decode(Data::moneys),
            'categorieSearchs' => json_decode(Data::categorieSearchs),
            'categorieListes' => json_decode(Data::categorieListes),
            'categorieSocials' => json_decode(Data::categorieSocials),
            'myAccounts' => json_decode(Data::myAccounts),
            'footerServices' => json_decode(Data::footerServices),
            'welcome' => json_decode(Data::welcome),
            'topLinks' => json_decode(Data::topLinks)
        ]);
    }

}