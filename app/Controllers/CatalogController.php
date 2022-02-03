<?php

class CatalogController {

    /**
     * Méthode gérant l'affichage de la page listant les produits par catégorie
     *
     * @param array $params contient les paramètres de l'url
     * @return void
     */
    public function categoriesAction($params)
    {
        // On récupère l'ID depuis le paramètre de la méthode pour l'envoyer à la vue
        $data = [
            'id' => $params['id']
        ];

        $this->show('categories', $data);
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

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}