<?php
namespace App\Controllers;
// use indique le namespace des classes appelées

use App\Models\Brand;
use App\Models\Pokemon;
use App\Models\Category;

// MainController est un enfant de CoreController
class MainController extends CoreController {

    // affiche la homepage
    public function homeAction() {

        // Pour gérer le titre de la page
        // Pour ça on utilise la méthode find du model Category

        //instance du model Category
        $categoryHomeModel = new Category; 
        // récupération des infos via la méthode de l'instance
        $categorysHome = $categoryHomeModel->findCategoryHome();
        // on utilisera $categorysHome->getName() pour le nom de la categorie
    
        // on prépare le paquet $data ou $viewData
        $data = [   
            'categories' => $categorysHome,        
        ];
    
        // on choisi la viewname('home')
        // on ajoute le paquet préparé ($data)
        $this->show('home', $data);
    }

    public function legalMentionsAction() {
        // On délègue l'affichage de la page à la méthode show
        // 'legalmentions' sera le $viewName (voir CoreController)
        $this->show('legalmentions');
    }

    public function errorAction() {
        $this->show('error');
    }

     // $params contient des informations sur la route
     // en provenance de altoRouteur comme l'id
     public function detailAction($params) {

        // création instance du model Pokemon
        $pokemonModel = new Pokemon;
        // récupération de l'id de la route
        $id = $params['id'];
        // récupération des infos via la méthode de l'instance
        $pokemon = $pokemonModel->find($id);

        // Récupération du type de pokemon
        $pokemonTypeModel = new Pokemon;
        $pokemonType = $pokemonTypeModel->findPokemonTypeColor($id);

        // préaration du clois
        $data = [
            'pokemon' => $pokemon,
            'pokemonType' => $pokemonType,
        ];

        // envoie du viewName et du colis
        $this->show('detail', $data);
    } 
}







