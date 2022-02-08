<?php 


// On commence par inclure le fichier autoload.php. Ce fichier se charge d'inclure toutes les classes téléchargées via composer.
require __DIR__.'/../vendor/autoload.php';

// require __DIR__ . '/../app/Utils/Database.php';
// require __DIR__ . '/../app/Controllers/CoreController.php';
// require __DIR__ . '/../app/Controllers/MainController.php';
// require __DIR__ . '/../app/Controllers/CatalogController.php';
// require __DIR__ . '/../app/Models/CoreModel.php';
// require __DIR__ . '/../app/Models/Product.php';
// require __DIR__ . '/../app/Models/Brand.php';
// require __DIR__ . '/../app/Models/Category.php';
// require __DIR__ . '/../app/Models/Type.php';

// spl_autoload_register('handleClassNotLoaded');

// function handleClassNotLoaded($className) {

    // echo "La classe non trouvée est : " . $className;

    // require __DIR__ . '/../app/Controllers/'. $className.'.php';


// }


//! $pageToDisplay n'est plus utilisé, AltoRouter récupère automatiquement le paramètre GET page
// Pour afficher nos pages, on a besoin de savoir quelle page est demandée. Le nom de la page est transmis dans l'url au sein du paramètre GET page. 
// Filter_input permet de récupérer ce paramètre. Si le paramètre n'existe pas, filter_input renvoie null, ce qui nous évite des erreurs 
// $pageToDisplay = filter_input(INPUT_GET, 'page');

// Si filter_input n'a pas trouvé de paramètre GET page, alors on affiche la page d'accueil
// if($pageToDisplay === null) {
//     $pageToDisplay = 'home';
// }


// On utilise la classe AltoRouter pour gérer nos routes. 
// On doit donc commencer par l'instancier

$router = new AltoRouter();

// On configure AltoRouter pour qu'il ne prenne pas en compte la partie fixe de l'url (le chemin vers notre dossier)
//! ATTENTION, si la partie fixe (BASE_URI) contient des caractères spéciaux ou des espaces, AltoRouter ne fonctionne pas ! 
$router->setBasePath($_SERVER['BASE_URI']);


// On crée notre routeur dans lequel on fait l'association entre une URL et une méthode d'un controller.

$router->map(
    'GET',  // Méthode HTTP de la requete (get ou post)
    '/',  // url de la route (/ = home)
    // Tableau contenant le controller et la méthode liée à la page
    [    
        'controller' => 'MainController',
        'method' => 'homeAction'
    ],
    'homepage'
);


$router->map(
    'GET',
    '/about',
    [
        'controller' => 'MainController',
        'method' => 'aboutAction'
    ],
    'page-about'
);


$router->map(
    'GET',
    // AltoRouter prévoit des urls avec une partie dynamique. Ici [i:id] veut dire "n'importe quel entier"
    '/catalogue/categorie/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'categoriesAction'
    ],
    'page-category'
);


$router->map(
    'GET',
    // AltoRouter prévoit des urls avec une partie dynamique. Ici [i:id] veut dire "n'importe quel entier"
    '/catalogue/type/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'typeAction'
    ],
    'page-type'
);

$router->map(
    'GET',
    // AltoRouter prévoit des urls avec une partie dynamique. Ici [i:id] veut dire "n'importe quel entier"
    '/catalogue/marque/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'brandAction'
    ],
    'page-brand'
);


$router->map(
    'GET',
    // AltoRouter prévoit des urls avec une partie dynamique. Ici [i:id] veut dire "n'importe quel entier"
    '/catalogue/produit/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'productAction'
    ],
    'page-product'
);


$router->map(
    'GET',
    '/mentions-legales-et-cgu',
    [
        'controller' => 'MainController',
        'method' => 'legalMentionsAction'
    ],
    'legal-notices'
);

// Route qui a pour unique but d'afficher des tests
$router->map(
    'GET',
    '/test',
    [
        'controller' => 'MainController',
        'method' => 'testAction'
    ],
    'page-test'
);

// La méthode match permet à AltoRouter de savoir si la page demandée existe dans la liste des routes
// $match contient un tableau avec les informations de la route actuelle (controller, méthode, nom, etc)
// Si la route actuelle n'existe pas, $match contient false
$match = $router->match();

// Décommenter la ligne suivante pour voir le contenu de $match
// dump($match);


// ---- DISPATCHER ----- 
// On vérifie que la page demandée fait partie des routes existantes. Si $match ne contient pas false, on est sur une route existante
if($match !== false) {
  
    // On récupère le nom du controller dans lequel est rangé notre méthode qui gère la page demandée
    $controllerToUse = 'App\Controllers\\' . $match['target']['controller'];

    // On récupère dans le tableau des routes le nom de la méthode à exécuter. 
    $methodToUse = $match['target']['method'];


    // On récupère les paramètres dynamiques de l'url (exemple : id)
    $params = $match['params'];

    // On instancie le controller dans lequel est rangé la méthode
    // Si $controllerToUse contient "MainController", ça revient à écrire "new MainController()"
    $controller = new $controllerToUse();

    // On utilise la variable $methodToUse pour exécuter la méthode de controller dont le nom est stocké dedans.
    // Si  $methodToUse contient "homeAction", c'est comme si on écrivait "$controller->homeAction($params)"
    $controller->$methodToUse($params);

} else {
    echo "Erreur 404 - la page n'existe pas";
}