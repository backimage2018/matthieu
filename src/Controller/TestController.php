<?php
namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/test/lazy", name="test_lazy")
     */
    function test_lazy(Request $request){
        $rep = $this->getDoctrine()->getRepository(Products::class);
        $deal = $rep->find(1);
        return  new Response('Aucun résultat');
        
    }
    
}