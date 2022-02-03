<?php
class MainController {

    

    public function homeAction() {
        $this->show('home');
    }

    public function aboutAction()
    {
        $this->show('about');
    }

    public function mentionsLegalesAction()
    {
        $this->show('mentionslegales');
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
        
        $absoluteURL = $_SERVER['BASE_URI'];
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}