<?php 

namespace App\Models;

use PDO;
use App\Utils\Database;
use App\Models\CoreModel;


// le model Category étend (ou hérite de) la classe CoreModel
class Category extends CoreModel {

    // Propriétés du model Brand
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;
     
    /**
     * Méthode permettant de récupérer un objet de type Category d'après son ID
     *
     * @param int $id ID de la catégorie à trouver
     * @return Category
     */
    public function find($id)
    {
        // On se connecte à la BDD à l'aide de notre nouvel outil Database. Celui-ci nous renvoie une instance de PDO connectée à la BDD en prenant en compte nos DNS, USERNAME, PASSWORD, NOM BDD  dans notre config.ini
        $pdo = Database::getPDO();
            
        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`
        WHERE `id` = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On veut récupérer le résultat sous la forme d'un objet de type Category. Donc on utilise fetchObject (à la place de fetch) qui va automatiquement instancier la classe Category et remplir les propriétés avec les infos de la BDD.
        $category = $pdoStatement->fetchObject(Category::class);

        return $category;
    }

    /**
     * Méthode qui récupère toutes les catégories de la BDD
     *
     * @return Array
     */
    public function findAll()
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec toutes les catégories
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
    }

    /**
     * Méthode qui récupère toutes les catégories de la BDD
     *
     * @return Array
     */
    public function findCategoryHome()
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `category`
        WHERE `home_order` > 0
        ORDER BY `home_order`  ASC
        LIMIT 5";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec toutes les catégories
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
    }


    public function findCategoryHome()
    {
        // On se connecte à la BDD à l'aide de notre nouvel outil Database. Celui-ci nous renvoie une instance de PDO connectée à la BDD en prenant en compte nos DNS, USERNAME, PASSWORD, NOM BDD  dans notre config.ini
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
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

   
    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

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
}