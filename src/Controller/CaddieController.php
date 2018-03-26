<?php

namespace App\Controller;

use App\Entity\Caddie;
use App\Entity\Products;
use App\Entity\User;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Repository\CaddieRepository;


class CaddieController extends Controller
{
    
    /**
     * @var CaddieRepository $caddieRepository
     */
    private $caddieRepository;
       
    /**
     * @param CaddieRepository $caddieRepository
     */
    public function __construct(CaddieRepository $caddieRepository)
    {
        $this->caddieRepository = $caddieRepository;
    }

    /**
     * @Route("/products/caddie/add/{id}", name="caddie_add", requirements={"id" = "\d+"})
     */
    public function addProductToCaddie(Request $request, $id)
    {
        /* Recuperation de l'id de l'utilisateur */
        $user_id = $this -> getUser() -> getId();
        
        /* La quantité d'un ajout dans le panier est defini par default a 1 */
        $qty = $request->request->getInt('qty', 1);
        
        /**
         * @var Products $product
         */
        $product = $this->getDoctrine()->getRepository(Products::class)->find($id);
        $user = $this->getDoctrine()->getRepository(User::class)->find($user_id);
        /**
         * @var Caddie $caddie
         */
        $caddie = $this->caddieRepository->findOneProductForUser($user_id, $product->getId());
        /* Add to card ajoute 1 nouveau produit */
        if ($caddie === null) {
            $caddie = new Caddie();
            $caddie -> setUser($user);
            $caddie -> setProduct($product);
        }
        /* S'il est deja présent dans la base il ajoute $qty */
        $caddie->setQuantity($caddie->getQuantity()+$qty);
        $em = $this->getDoctrine()->getManagerForClass(Caddie::class);
        $em -> persist($caddie);
        $em -> flush();

        $result = $this->listProductCaddie($request);
        return $result;
    }
    
    /**
     * @Route("/products/caddie/card")
     */
    public function listProductCaddie(Request $request){
        
        /* Recuperation de l'id de l'utilisateur */
        $user_id = $this -> getUser() -> getId();
        
        /* Récupération de la liste de tous les éléments du caddie d'un utilisateur par son id*/
        $caddieList = $this->caddieRepository->findAllProductInCaddie($user_id);
        
        /* $prix et $quantite sont definir par default a 0 */
        $prix = 0;
        $quantite = 0;
        /**
         * @var Caddie $caddie
         */
        foreach ($caddieList as $caddie){
            $prix += $caddie->getQuantity()*$caddie->getProduct()->getPrixActuel();
            $quantite += $caddie->getQuantity();
        }
        
        $result = $this->renderView('includes/cardlist.html.twig', ["list" => $caddieList]);
        /* Round arrondira le resultat 2 chiffres apres la virgule */
        /* Utilisation de PHP_ROUND_HALF_UP avec une précision d'une décimale */
        return $this->json(["result"=> $result, "quantite"=> $quantite, "prix"=> round($prix, 2, PHP_ROUND_HALF_UP)]);
    }
    
    /**
     * @Route("/card", name="card")
     */   
    function card() {
        
        /* Récupération de la liste de tous les articles du caddie en DB afin de les renvoyer dans la vue avec le render */
        $product = $this->getDoctrine()->getRepository(Caddie::class)->findAll();
        return $this->render('card.html.twig', [
            'product' => $product,
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
     * @Route("/checkout", name="checkout")
     */
    function checkout() {
        
        /* Récupération de la liste de tous les articles du caddie en DB afin de les renvoyer dans la vue avec le render */
        $product = $this->getDoctrine()->getRepository(Caddie::class)->findAll();
        return $this->render('checkout.html.twig', [
            'product' => $product,
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
     * @Route("/products/caddie/edit/{id}", name="caddie_edit", requirements={"id" = "\d+"})
     */
    public function editProductToCaddie(Request $request, $id){
        $user_id = $this -> getUser() -> getId();
        $qty = $request->request->getInt('qty');
        /**
         * @var Products $product
         */
        $product = $this->getDoctrine()->getRepository(Products::class)->find($id);
        $user = $this->getDoctrine()->getRepository(User::class)->find($user_id);
        /**
         * @var Caddie $caddie
         */
        $caddie = $this->caddieRepository->findOneProductForUser($user_id, $product->getId());
        $caddie-> setQuantity($qty);
        $em = $this->getDoctrine()->getManagerForClass(Caddie::class);
        $em -> persist($caddie);
        $em -> flush();
        return $this->json('recalculate');
    }
    
    /**
     * @Route("/products/caddie/remove/{id}", name="caddie_remove", requirements={"id" = "\d+"})
     */
    public function removeProductToCaddie(Request $request, $id){
        $user_id = $this -> getUser() -> getId();
        /**
         * @var Products $product
         */
        $product = $this->getDoctrine()->getRepository(Products::class)->find($id);
        $user = $this->getDoctrine()->getRepository(User::class)->find($user_id);
        /**
         * @var Caddie $caddie
         */
        $caddie = $this->caddieRepository->findOneProductForUser($user_id, $product->getId());
        $em = $this->getDoctrine()->getManagerForClass(Caddie::class);
        $em -> remove($caddie);
        $em -> flush();
        
        return $this->json('remove');
    }
    
}
