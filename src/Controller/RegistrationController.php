<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $user -> setRoles(array('ROLE_USER'));
        $form = $this->createForm(UserType::class, $user);
        
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            
            return $this->redirectToRoute('index');
        }
        
        return $this->render('security/registration.html.twig', array(
            'form' => $form->createView(),
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
    
   
    
    
    
}