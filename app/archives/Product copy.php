<?php 

namespace App\Models;

use PDO;
use App\Utils\Database;
use App\Models\CoreModel;


// Un model est une classe qui sert à représenter une table de la BDD. Ce model Product représente la table "product".
class Product extends CoreModel{

    
    // Pour chaque colonne de la table "product", on se crée une propriété privée dans le model Product.
    // On bloque l'accès à ces propriétés depuis l'extérieur de la classe grace au mot-clé private.
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $type_id;
    private $category_id;
    private $brand_id;

    public function find($id)
    {

        // On se connecte à la BDD à l'aide de notre nouvel outil Database. Celui-ci nous renvoie une instance de PDO connectée à la BDD.
        $pdo = Database::getPDO();
       
        // Je fais ma requete SQL
        $sql = "SELECT * FROM `product`
        WHERE `id` = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On veut récupérer le résultat sous la forme d'un objet de type Product. Donc on utilise fetchObject (à la place de fetch) qui va automatiquement instancier la classe Product et remplir les propriétés avec les infos de la BDD.
        $product = $pdoStatement->fetchObject(Product::class);

        return $product;
    }

    public function findAll()
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `product`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

     
    public function findAllProductByCategory($id, $order = "id")
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT 
        `product`.*, 
        `type`.`name`  AS `type_name`
        FROM `product`
        INNER JOIN `type` ON `type`.`id` = `product`.`type_id`
        WHERE `category_id`  =" .$id. " ORDER BY ".$order . " LIMIT 12" ;
        //  SELECT toutes les colonnes de la table product + la colonne name de la table type
        // que l'on renomera type_name

        // INNER JOIN  joint la table type  avec la table product
        // en collant la table type de cette façon:
        // colonne id de table type = la colonne type_id de la table product

        $pdoStatement = $pdo->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        // Si le nom n'est pas vide, on le sauvegarde dans la propriété
        if($name !== "") {
            $this->name = $name;
        }
        return $this;
    }

}