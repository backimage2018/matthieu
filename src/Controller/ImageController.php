<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Image;
use App\Entity\Products2;
use App\Form\ImageType;
use App\Form\Products2Type;

class ImageController extends Controller
{
    /**
     * @Route("/admin/image/add", name="image_add")
     */
    
    public function addImage(Request $request)
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            /* Recuperer le fichier exclusivement */
            $file = $image->getUrl();
            
            /* Recuperer le nom du fichier exclusivement */
            $filename = $file -> getClientOriginalName();
            
            /* Deplacer le fichier image dans un repertoire specifique */
            $file -> move(
                $this -> getParameter('upload_directory'),
                $filename
            );
            
            $image->setUrl($filename);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            
            return $this->redirectToRoute('image_add');
            
        }
        
        return $this->render('admin/image.html.twig', array(
            'form'=> $form->createView()
        ));
    }
    
    
    /**
     * @Route("/admin/image/{id}", name="image_show", requirements={"id" = "\d+"})
     */
     
    public function showImage(Request $request, $id) 
    {
        /* Recuperation du ficier en DB grace au parametre de l'id */
        $image = $this->getDoctrine()->getRepository(Image::class) -> find($id);
        
        /* Pour l'upload */
        $filename = $image -> getUrl();
        $file = new File ($this -> getParameter('upload_directory').DIRECTORY_SEPARATOR.$filename);
        $image -> setUrl($file);

        /* Creation du formulaire */
        $form = $this->createForm(ImageType::class, $image);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            
            return $this->redirectToRoute('image_show', array(
                'id'=> $id
            ));
        }
                
        return $this->render('admin/image.html.twig', array(
            'form'=> $form->createView()
        ));
        
    }
}