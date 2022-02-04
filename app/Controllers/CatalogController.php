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

    public function typeAction($params)
    {
        // On récupère l'ID depuis le paramètre de la méthode pour l'envoyer à la vue
        $data = [
            'id' => $params['id']
        ];

        $this->show('type', $data);
    }

    public function brandAction($params)
    {
        // On récupère l'ID depuis le paramètre de la méthode pour l'envoyer à la vue
        $data = [
            'id' => $params['id']
        ];

        $this->show('marque', $data);
    }

    public function productAction($params)
    {
        // On a besoin du produit dont l'ID se trouve dans l'URL.
        $productID = $params['id'];

        // La fonction qui permet de retrouver un produit est rangée dans le model Product. On commence par l'instancier.
        $productModel = new Product;

        // On exécute la méthode find qui nous renvoie un produit selon l'ID demandé
        $product = $productModel->find($productID);

        // On ajoute le produit trouvé au colis de données envoyé à la vue
        $params['product'] = $product;
        
        // On appelle la méthode show pour qu'elle affiche la page d'un produit lui passant les paramètres de l'url.
        $this->show('product', $params);
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