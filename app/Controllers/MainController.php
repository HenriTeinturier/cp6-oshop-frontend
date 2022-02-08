<?php

namespace App\Controllers;

use App\Models\Brand;

class MainController extends CoreController {

    /**
     * Méthode qui gère l'affichage de la page d'accueil
     *
     * @return void
     */
    public function homeAction() {
        $this->show('home');
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