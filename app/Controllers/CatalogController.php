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

        // Pour gérer le titre de la page, on a besoin de récupérer la catégorie dont l'ID est dans l'url.
        // Pour ça on utilise la méthode find du model Category
        $categoryModel = new Category;
        $category = $categoryModel->find($params['id']);

        // On récupère l'ID depuis le paramètre de la méthode pour l'envoyer à la vue
        $data = [
            'id' => $params['id'],
            'category' => $category
        ];

        $this->show('categories', $data);
    }

    /**
     * Méthode affichant des produits filtrés par type
     *
     * @param array $params Doit contenir une entrée ID qui représente l'identifiant du type
     * @return void
     */
    public function typeAction($params)
    {
        // On appelle la méthode show pour qu'elle affiche la page types en lui passant les paramètres de l'url.
        $this->show('types', $params);
    }

    /**
     * Méthode affichant des produits filtrés par marque
     *
     * @param array $params Doit contenir une entrée ID qui représente l'identifiant de la marque
     * @return void
     */
    public function brandAction($params)
    {
        // On appelle la méthode show pour qu'elle affiche la page des produits filtrés par marque en lui passant les paramètres de l'url.
        $this->show('brands', $params);
    }


    /**
     * Méthode affichant la page d'un produit
     *
     * @param array $params Doit contenir une entrée ID qui représente l'identifiant d'un produit
     * @return void
     */
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