<?php
class MainController {

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

    public function testAction($params)
    {
        $marqueid = 5; // recupere l'id de la marque à afficher
        $marqueModel = new Brand; // creer une instance de Brand
        $marque = $marqueModel->find($marqueid); // on execute find pour trouver le produit
        $params['marque'] = $marque; // on ajoute la marque à notre colis

        $marqueModels = new Brand;
        $marques = $marqueModels->findAll();
        $params['marques'] = $marques;
        
        $typeid = 5; // recupere l'id de la marque à afficher
        $typeModel = new Type; // creer une instance de Brand
        $type = $typeModel->find($typeid); // on execute find pour trouver le produit
        $params['type'] = $type; // on ajoute la marque à notre colis

        $typeModels = new Type;
        $types = $typeModels->findAll();
        $params['types'] = $types;

        $categoryid = 5; // recupere l'id de la marque à afficher
        $categoryModel = new Category; // creer une instance de Brand
        $category = $categoryModel->find($categoryid); // on execute find pour trouver le produit
        $params['category'] = $category; // on ajoute la marque à notre colis

        $categoryModels = new Category;
        $categorys = $categoryModels->findAll();
        $params['categorys'] = $categorys;
        
        // On délègue l'affichage de la page à la méthode show
        $this->show('test', $params);
    }

    /**
     * Fonction qui se charge d'afficher une page donnée
     *
     * @param string $viewName Nom du template de page à afficher
     * @param array $viewData Tableau contenant les différentes informations qu'on veut passer à notre vue
     * @return void
     */
    public function show($viewName, $viewData = [])
    {
        
        // Sur toutes les pages, on a besoin d'avoir accès à la variable $absoluteUrl. Celle-ci contient le chemin vers le dossier public et permet de générer les liens vers les assets.
        $absoluteUrl = $_SERVER['BASE_URI'];

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}