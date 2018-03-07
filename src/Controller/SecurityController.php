<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller {
    
    
    /**
     * @Route("/login", name="login")
     */
    
    public function login(Request $request, AuthenticationUtils $authUtils) {
        
        /* obtenir l'erreur de connexion s'il y en a une */
        $error = $authUtils->getLastAuthenticationError();
        
        /* Dernier login entre par l'utilisateur */
        $lastUsername = $authUtils->getLastUsername();
        
        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
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