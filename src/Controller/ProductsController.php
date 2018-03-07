<?php
namespace App\Controller;

use App\Form\ProductsType;
use App\Entity\Products;
use App\Form\ReviewType;
use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Image;


class ProductsController extends Controller
{
    /**
     * @Route("/admin/products/new", name="admin_products")
     */
    
    public function registerProducts(Request $request)
    {
        var_dump($request->request);
        $products = new Products();
        $imageobj = new Image();
        
        $form = $this->createForm(ProductsType::class, $products);
        $listeProduits = $this-> getDoctrine()-> getRepository(Products::class)-> findAll();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            echo '<pre>';
            var_dump($products->getImageobj());
            echo '</pre>';
            
            $file = $products -> getImageobj() -> getUrl();
            $filename = $file -> getClientOriginalName();
            
            $file -> move(
                $this -> getParameter('upload_directory'),
                $filename
            );
            $imageobj->setUrl($filename);
            $products->setImageobj($imageobj);

            $em = $this->getDoctrine()->getManager();
            $em->persist($products);
            $em->flush();
            
            return $this->redirectToRoute('admin_products');
        
        }
        
        return $this->render('admin/products.html.twig', array(
            'form'=> $form->createView(),
            'listeProduits' => $listeProduits
        ));
    }
    
    /**
     * @Route("/admin/products/{id}", name="admin_products_load", requirements={"id" = "\d+"})
     */
    
    public function loadProducts(Request $request, $id)
    {
        $param = [];
        $listeProduits = $this-> getDoctrine()-> getRepository(Products::class)-> findAll();
        $products = $this->getDoctrine()
            ->getRepository(Products::class)
            ->find($id);
        $param["products"] = $products;
        $form = $this->createForm(ProductsType::class, $products);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($products);
            $em->flush();
            return $this->redirectToRoute('admin_products_load', array(
                'id'=> $id
            ));
        }
        $param["form"] = $form->createView();
        $param["listeProduits"] = $listeProduits;
        return $this->render("admin/products.html.twig", $param);
        
    }
    
    /**
     * @Route("/admin/products-delete/{id}", name="admin_products_delete", requirements={"id" = "\d+"})
     */
    
    public function deleteProducts(Request $request, $id)
    {
        $param = [];
        $listeProduits = $this-> getDoctrine()-> getRepository(Products::class)-> findAll();
        $products = $this->getDoctrine()
        ->getRepository(Products::class)
        ->find($id);
        $param["products"] = $products;
        $form = $this->createForm(ProductsType::class, $products);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($products);
            $em->flush();
            return $this->redirectToRoute('admin_products');
        }
        $param["form"] = $form->createView();
        $param["listeProduits"] = $listeProduits;
        return $this->render("admin/products.html.twig", $param);
    }
    
    /**
     * @Route("/product-page/{id}", name="product_page" ,requirements = {"id" = "\d+"})
     */
    
    function productPage($id) {
        
        $review = new Review();
        $form = $this->createForm(Review::class, $review);
        $form -> handleRequest($request);
        
        $reviewListe = $this-> getDoctrine()-> getRepository(Review::class)->findAll();
        $produit = $this-> getDoctrine()-> getRepository(Products::class)-> find($id);
        
        if($form-> isSubmitted()&& $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em -> persist($review);
            $em -> flush();
            
            return $this->redirectToRoute('product_page', array(
                'id'=>$id
            ));
        }
        
        return $this->render('product-page.html.twig', array(
            'reviewListe'=> $reviewListe,
            'produit' => $produit,
            'reviews' => json_decode(Data::reviews),
            'langues' => json_decode(Data::langues),
            'moneys' => json_decode(Data::moneys),
            'categorieSearchs' => json_decode(Data::categorieSearchs),
            'categorieListes' => json_decode(Data::categorieListes),
            'categorieSocials' => json_decode(Data::categorieSocials),
            'myAccounts' => json_decode(Data::myAccounts),
            'footerServices' => json_decode(Data::footerServices),
            'welcome' => json_decode(Data::welcome),
            'topLinks' => json_decode(Data::topLinks)
        ));
    }
    
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    
    /**
     * @Route("admin/product2", name="products2")
     */
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}