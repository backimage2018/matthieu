<?php
namespace App\Controller;

class Data {
    
    const welcome = '{"message":"Welcome to E-shop"}';
    const cgvs = '{"msg":"Voici les CGV"}';
    const return = '{"msg":"Si vous souhaitez nous renvoyer un colis procedez ainsi :..."}';
    const guide = '{"msg":"Si vous souhaitez obtenir plus d\'informations vous ne trouvez ici qu\'une amere deception."}';
    const stores = '[
    {
	   "ville": "Nîmes",
	   "adresse": "Lorem ipsum dolor sit amet"
    },
    {
	   "ville": "Montpellier",
	   "adresse": "Lorem ipsum dolor sit amet"
    }]';
  
    const myAccounts = '[
            {
                "cls":"fa-user-o",
                "reference": "My Account",
                "link":"/profil"
            },
            {
                "cls":"fa-heart-o",
                "reference": "My Wishlist",
                "link":"/"
            },
            {
                "cls":"fa-exchange",
                "reference": "Compare",
                "link":"/"
            },
            {
                "cls":"fa-check",
                "reference": "Checkout",
                "link":"/checkout"
            }
         ]';
    
    const langues = '[
            {
                "lang":"English",
                "diminutif":"(ENG)",
                "link":"/"
            },
            {
                "lang":"Russian",
                "diminutif":"(Ru)",
                "link":"/"
            },
            {
                "lang":"French",
                "diminutif":"(FR)",
                "link":"/"
            },
            {
                "lang":"Spanish",
                "diminutif":"(Es)",
                "link":"/"
            }
         ]';
    
    const moneys = '[
            {
                "type":"USD",
                "devise":"($)",
                "link": "/"
            },
            {
                "type":"EUR",
                "devise":"(€)",
                "link": "/"
            }
         ]';
    
    const topLinks = '[
            {
                "nom":"Store",
                "link": "/store",
                "classe":"store"
            },
            {
                "nom":"Newsletter",
                "link": "#inputNewsletter",
                "classe":"newsletter"
            },
            {
                "nom":"FAQ",
                "link": "/faq",
                "classe":"faq"
            }
         ]';
    
    const categorieSearchs = '[
            {
                "valeur":"0",
                "titre":"All Categories"
            },
            {
                "valeur":"1",
                "titre":"Bags"
            },
            {
                "valeur":"2",
                "titre":"Shoes"
            },
            {
                "valeur":"3",
                "titre":"Clothing"
            },
            {
                "valeur":"4",
                "titre":"Phones"
            },
            {
                "valeur":"5",
                "titre":"Accessories"
            },
            {
                "valeur":"6",
                "titre":"Consumer"
            },
            {
                "valeur":"7",
                "titre":"Office"
            },
            {
                "valeur":"8",
                "titre":"Jewelry"
            },
            {
                "valeur":"9",
                "titre":"Watches"
            },
            {
                "valeur":"10",
                "titre":"Electronics"
            }
        ]';
    
    const categorieListes = '[
            {
                "link":"/",
                "categorie":"Women\'s Clothing"
            },
            {
                "link":"/",
                "categorie":"Men\'s Clothing"
            },
            {
                "link":"/",
                "categorie":"Phones & Accessories"
            },
            {
                "link":"/",
                "categorie":"Consumer & Office"
            },
            {
                "link":"/",
                "categorie":"Consumer Electronics"
            },
            {
                "link":"/",
                "categorie":"Jewelry & Watches"
            },
            {
                "link":"/",
                "categorie":"Bags & Shoes"
            },
            {
                "link":"/",
                "categorie":"View All"
            }
         ]';
    
    const categorieSocials = '[
            {
                "link":"https://www.facebook.com/",
                "classe":"fa-facebook"
            },
            {
                "link":"https://twitter.com/?lang=fr",
                "classe":"fa-twitter"
            },
            {
                "link":"https://www.instagram.com/?hl=fr",
                "classe":"fa-instagram"
            },
            {
                "link":"https://plus.google.com/",
                "classe":"fa-google-plus"
            },
            {
                "link":"https://www.pinterest.fr/",
                "classe":"fa-pinterest"
            }
         ]';
    
    const footerServices = '[
            {
                "link":"/about",
                "nom":"About Us"
            },
            {
                "link":"/return",
                "nom":"Shipping & Return"
            },
            {
                "link":"/guide",
                "nom":"Shiping Guide"
            },
            {
                "link":"/faq",
                "nom":"FAQ"
            }
        
         ]';
    
    const aboutUs = '{"msg": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent congue in tortor eget laoreet. Morbi commodo mi elit.Pellentesque interdum porttitor feugiat."}';
    
    
    const reviews = '[
            {
                "user" : "John",
                "date" : "27 DEC 2017 / 8:00 PM",
                "message" : "Depuis des années je n\'avais jamais vu une paire de chaussure aussi magnifique a tel point que j\'ai choisis de les coudre a mes pieds pou rne plus jamais les quitter. Je met la note de 4/5 car ça c\'est devenu plus difficile de se gratter le pied a présent ! Malgré tout ça , achetez-les les yeux fermés ! "
            },
            {
                "user" : "Marie",
                "date" : "29 DEC 2017 / 4:00 AM",
                "message" : "j\'en ai pris 7 paires, une pour chaque jour de la semaine !"
            },
            {
                "user" : "Kevin",
                "date" : "3 NOV 2017 / 0:00 AM",
                "message" : "First"
            }]';
    
    const details = '[
            {
                "lienImage" : "./img/thumb-product01.jpg",
                "nom" : "Tennis Swagy",
                "size" : "XL",
                "color":"Camelot",
                "prixActuel": "32.50",
                "prixAncien": "145.00",
                "quantite":"1",
                "total": "32.50"
            },
            {
                "lienImage" : "./img/thumb-product01.jpg",
                "nom" : "Tennis Swagy",
                "size" : "XL",
                "color":"Camelot",
                "prixActuel": "32.50",
                "prixAncien": "145.00",
                "quantite":"1",
                "total": "32.50"
            },
            {
                "lienImage" : "./img/thumb-product01.jpg",
                "nom" : "Tennis Swagy",
                "size" : "XL",
                "color":"Camelot",
                "prixActuel": "32.50",
                "prixAncien": "145.00",
                "quantite":"1",
                "total": "32.50"
            }]';
    
    
    
}