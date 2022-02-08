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



    /**
     * Méthode qui permet de récupérer un produit donné dans la BDD
     *
     * @param int $id ID du produit à rechercher
     * @return Product
     */
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

    /**
     * Méthode qui récupère tous les produits de la BDD
     *
     * @return Array
     */
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

     /**
     * Méthode qui récupère tous les produits de la BDD
     *
     * @return Array
     */
    public function findAllProductByCategory($id)
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT 
        `product`.*, 
        `type`.`name`  AS `type_name`
        FROM `product`
        INNER JOIN `type` ON `type`.`id` = `product`.`type_id`
        WHERE `category_id`  = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    /**
     * Méthode qui récupère tous les produits de la BDD
     *
     * @return Array
     */
    public function findAllProductByType($id)
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT 
        `product`.*, 
        `type`.`name`  AS `type_name`
        FROM `product` 
        INNER JOIN `type` ON `type`.`id` = `product`.`type_id`
        WHERE `type_id`  = " . $id . " LIMIT 12" ;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

     /**
     * Méthode qui récupère tous les produits de la BDD
     *
     * @return Array
     */
    public function findAllProductByBrand($id)
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT 
        `product`.*, 
        `type`.`name`  AS `type_name`
        FROM `product` 
        INNER JOIN `type` ON `type`.`id` = `product`.`type_id`
        WHERE `brand_id`  = " . $id . " LIMIT 12" ;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        // Si le nom n'est pas vide, on le sauvegarde dans la propriété
        if($name !== "") {
            $this->name = $name;
        }

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price  . ' €';
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }



    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }
}