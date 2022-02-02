<?php 

require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';

// Pour afficher nos pages, on a besoin de savoir quelle page est demandée. Le nom de la page est transmis dans l'url au sein du paramètre GET page. 
// Filter_input permet de récupérer ce paramètre. Si le paramètre n'existe pas, filter_input renvoie null, ce qui nous évite des erreurs 
$pageToDisplay = filter_input(INPUT_GET, 'page');



// Si filter_input n'a pas trouvé de paramètre GET page, alors on affiche la page d'accueil
if($pageToDisplay === null) {
    $pageToDisplay = 'home';
}


// On crée notre routeur dans lequel on fait l'association entre une URL et une méthode d'un controller.
$routes = [
    'home' => [
        'controller' => 'MainController',
        'method' => 'homeAction'
    ],
    '/home' => [
        'controller' => 'MainController',
        'method' => 'homeAction'
    ],
    '/about' => [
        'controller' => 'MainController',
        'method' => 'aboutAction'
    ],
    '/categories' => [
        'controller' => 'CatalogController',
        'method' => 'categoriesAction'
    ],
];

// ---- DISPATCHER ----- 
// On vérifie que la page demandée fait partie des routes listées dans le tableau $routes.
if(isset($routes[$pageToDisplay])) {
  
    // On récupère le nom du controller dans lequel est rangé notre méthode qui gère la page demandée
    $controllerToUse = $routes[$pageToDisplay]['controller'];

    // On récupère dans le tableau des routes le nom de la méthode à exécuter. 
    $methodToUse = $routes[$pageToDisplay]['method'];

    // On instancie le controller dans lequel est rangé la méthode
    $controller = new $controllerToUse();

    // On utilise la variable $methodToUse pour exécuter la méthode de controller dont le nom est stocké dedans.
    $controller->$methodToUse();

} else {
    echo "Erreur 404 - la page n'existe pas";
}