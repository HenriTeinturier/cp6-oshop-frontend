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

    /**
     * Fonction qui se charge d'afficher une page donnée
     *
     * @param string $viewName Nom du template de page à afficher
     * @param array $viewData Tableau contenant les différentes informations qu'on veut passer à notre vue
     * @return void
     */
    public function show($viewName, $viewData = [])
    {
        // On demande à PHP d'aller chercher la variable $router pour pouvoir l'utiliser dans nos templates.
        //! C'est une mauvaise pratique. Elle passe outre les différents principes mis en place avec notre architecture. Donc on verra plus tard comment procéder autrement.
        global $router;

        // Sur toutes les pages, on a besoin d'avoir accès à la variable $absoluteUrl. Celle-ci contient le chemin vers le dossier public et permet de générer les liens vers les assets.
        $absoluteUrl = $_SERVER['BASE_URI'];


        // On va chercher les 5 marques du footer à l'aide de la méthode dédiée dans le model Brand
        $brandModel = new Brand;
        $footerBrands = $brandModel->findAllForFooter();

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}