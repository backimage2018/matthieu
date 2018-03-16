<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Controller\Data;
use App\Entity\Products;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class DefaultController extends Controller {
    
    /**
     * @Route("/admin", name="admin")
     */
    
    function admin() {
        return $this->render('admin/admin.html.twig');
    }
    
    /**
     * @Route("/", name="index")
     */
    
    function index() {
        
        $forYous = $this->getDoctrine()
        ->getRepository(Products::class)
        ->findAll();
        
        
        $dealOfTheDay = $this->getDoctrine()
        ->getRepository(Products::class)
        ->findAll();
        
        $lastProducts = $this->getDoctrine()
            ->getRepository(Products::class)
            ->findBy(['status'=>'New']);
        
        return $this->render('index.html.twig', [
            'dealOfTheDay' => $dealOfTheDay,
            'lastestProducts' => $lastProducts,
            'forYous' => $forYous,
            'myAccounts' => json_decode(Data::myAccounts),
            'langues' => json_decode(Data::langues),
            'moneys' => json_decode(Data::moneys),
            'topLinks' => json_decode(Data::topLinks),
            'categorieSearchs' => json_decode(Data::categorieSearchs),
            'categorieListes' => json_decode(Data::categorieListes),
            'categorieSocials' => json_decode(Data::categorieSocials),
            'footerServices' => json_decode(Data::footerServices),
            'welcome' => json_decode(Data::welcome)
        ]);
    }
    
    /**
     * @Route("/products", name="products")
     */
    
    function products() {
        $listeProduits = $this-> getDoctrine()
        -> getRepository(Products::class)
        -> findAll();
        
        return $this->render('products.html.twig', [ 
            'listeProduits' => $listeProduits,
            'topLinks' => json_decode(Data::topLinks),
            'langues' => json_decode(Data::langues),
            'moneys' => json_decode(Data::moneys),
            'categorieSearchs' => json_decode(Data::categorieSearchs),
            'categorieListes' => json_decode(Data::categorieListes),
            'categorieSocials' => json_decode(Data::categorieSocials),
            'myAccounts' => json_decode(Data::myAccounts),
            'footerServices' => json_decode(Data::footerServices),
            'welcome' => json_decode(Data::welcome)
        ]);
    }
    
   
    
    /**
     * @Route("/checkout", name="checkout")
     */
    
    function checkout() {
        return $this->render('checkout.html.twig', [
            'details' => json_decode(Data::details),
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
    
    /**
     * @Route("/blank", name="blank")
     */
    
    function blank() {
        return $this->render('blank.html.twig', [
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
    
    /**
     * @Route("/card", name="card")
     */
    
    function card() {
        return $this->render('card.html.twig', [
            'details' => json_decode(Data::details),
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
    
    /**
     * @Route("/about", name="about")
     */
    
    function about() {
        return $this->render('about.html.twig', [
            'langues' => json_decode(Data::langues),
            'moneys' => json_decode(Data::moneys),
            'categorieSearchs' => json_decode(Data::categorieSearchs),
            'categorieListes' => json_decode(Data::categorieListes),
            'categorieSocials' => json_decode(Data::categorieSocials),
            'myAccounts' => json_decode(Data::myAccounts),
            'footerServices' => json_decode(Data::footerServices),
            'welcome' => json_decode(Data::welcome),
            'aboutUs' => json_decode(Data::aboutUs),
            'topLinks' => json_decode(Data::topLinks)
        ]);
    }
    
    
    /**
     * @Route("/profil", name="profil")
     */
    
    function profil() {
        return $this->render('profil.html.twig', [
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
    
    /**
     * @Route("/return", name="return")
     */
    
    function return() {
        return $this->render('return.html.twig', [
            'return' => json_decode(Data::return),
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
    
    /**
     * @Route("/guide", name="guide")
     */
    
    function guide() {
        return $this->render('guide.html.twig', [
            'guide' => json_decode(Data::guide),
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
    
    /**
     * @Route("/store", name="store")
     */
    
    function store() {
        return $this->render('store.html.twig', [
            'stores' => json_decode(Data::stores),
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
    
    /**
     * @Route("/cgv", name="cgv")
     */
    
    function cgv() {
        return $this->render('cgv.html.twig', [
            'cgvs' => json_decode(Data::cgvs),
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