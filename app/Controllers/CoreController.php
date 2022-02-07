<?php

class CoreController {

      /**
    * Fonction qui se charge d'afficher une page donnée
    *
    * @param string $viewName Nom du template de page à afficher
    * @param array $viewData Tableau contenant les différentes informations qu'on veut passer à notre vue
    * @return void
    */
    protected function  show($viewName, $viewData = []) {

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