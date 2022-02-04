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