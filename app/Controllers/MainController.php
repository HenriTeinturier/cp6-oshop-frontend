<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;

class MainController extends CoreController {

    /**
     * Méthode qui gère l'affichage de la page d'accueil
     *
     * @return void
     */
    public function homeAction() {

<<<<<<< HEAD
        // Pour gérer le titre de la page, on a besoin de récupérer la catégorie dont l'ID est dans l'url.
        // Pour ça on utilise la méthode find du model Category
        $categoryModel = new Category;
        $categories = $categoryModel->findCategoryHome();

=======


        // Pour gérer le titre de la page, on a besoin de récupérer la catégorie dont l'ID est dans l'url.
        // Pour ça on utilise la méthode find du model Category
        $categoryHomeModel = new Category;
        $categorysHome = $categoryHomeModel->findCategoryHome();
    
>>>>>>> e06-atelier-solo
        
        // On récupère l'ID depuis le paramètre de la méthode pour l'envoyer à la vue
        $data = [
            
<<<<<<< HEAD
<<<<<<< HEAD
            'categories' => $categories,  // objet categories
            

        ];


        


        $this->show('home', $data );
=======
            'categorys' => $categorysHome,  // objet category -> getName pour le nom de la categorie
=======
            'categories' => $categorysHome,  // objet category -> getName pour le nom de la categorie
>>>>>>> e06-atelier-solo
            
    
        ];
    
        $this->show('home', $data);

        
>>>>>>> e06-atelier-solo
    }
    

    

    

    /**
     * Méthode qui gère la page "à propos"
     *
     * @return void
     */
    public function aboutAction()
    {
        // On n'a pas créé de template pour cette page, pour l'instant on laisse juste un petit message !
        echo "Page about";
    }

    public function legalMentionsAction()
    {
        
        // On délègue l'affichage de la page à la méthode show
        $this->show('legalmentions');
    }

    /**
     * Méthode qui affiche une page de test (pour tester toutes sortes de codes)
     *
     * @return void
     */
    public function testAction() {
        echo "On affiche nos tests ci-dessous";

        // On teste de récupérer la marque n°2
        // On intancie le model Brand pour utiliser sa méthode find
        $brandModel = new Brand;

        // On utilise la méthode find pour récupérer la marque dans une variable
        $brand = $brandModel->find(3);

        dump($brand);
        echo $brand->getName();

        // On teste la méthode findAll qui doit renvoyer toutes les marques
        $brands = $brandModel->findAll();

        dump($brands);
    }

}