<?php 
namespace App\Models;
// use indique le namespace des classes appelées
use PDO;
use App\Utils\Database;
use App\Models\CoreModel;

//  Category(Model) est un enfant de CoreModel
class Category extends CoreModel {

    // Chaque colonne de la BDD doit avoir sa propriété.
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;
     
    // exemples de Méthodes du Model Category
    public function find($id){
        // On se connecte à la BDD à l'aide de Database.
        // Celui-ci nous renvoie une instance de PDO connectée à la BDD.
        $pdo = Database::getPDO();
            
        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`
        WHERE `id` = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On veut récupérer le résultat sous la forme d'un objet de type Category.
        // on utilise fetchObject 
        $category = $pdoStatement->fetchObject(Category::class);

        return $category;
    }




    public function findAll(){
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec toutes les catégories
        // on veut récupérer un tableau avec des objets dedans. 
        // fetchAll + mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
    }


    

    public function findCategoryHome(){
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`
        WHERE `home_order` > 0
        ORDER BY `home_order`  ASC
        LIMIT 5";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $categorys = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categorys;
    }

    
    // tous les getters et setters (j'en ai retiré pour l'exemple)
    // peuvent être crée auto par vsc
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;

        return $this;
    }
    public function getHome_order(){
        return $this->home_order;
    }
}








