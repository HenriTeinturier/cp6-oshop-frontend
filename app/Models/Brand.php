<?php 

namespace App\Models;

use PDO;
use App\Utils\Database;
use App\Models\CoreModel;

class Brand  extends CoreModel{

    // Propriétés du model Brand
    private $name;
    private $footer_order;

    
    /**
     * Méthode permettant de récupérer un objet de type Brand d'après son ID
     *
     * @param int $id ID de la marque à trouver
     * @return Brand
     */
    public function find($id)
    {
        // On se connecte à la BDD à l'aide de notre nouvel outil Database. Celui-ci nous renvoie une instance de PDO connectée à la BDD.
        $pdo = Database::getPDO();
            
        // Je fais ma requete SQL
        $sql = "SELECT * FROM `brand`
        WHERE `id` = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On veut récupérer le résultat sous la forme d'un objet de type Brand. Donc on utilise fetchObject (à la place de fetch) qui va automatiquement instancier la classe Brand et remplir les propriétés avec les infos de la BDD.
        $brand = $pdoStatement->fetchObject(Brand::class);

        return $brand;
    }

    /**
     * Méthode qui récupère toutes les marques de la BDD
     *
     * @return Array
     */
    public function findAll()
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `brand`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec toutes les marques
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;
    }

    /**
     * Méthode permettant de récupérer les 5 marques à afficher dans le footer
     *
     * @return Array
     */
    public function findAllForFooter()
    {
        
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `brand`
        WHERE `footer_order` > 0
        ORDER BY `footer_order` ASC
        LIMIT 5";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On traduit le résultat en un tableau contenant des objets de type Brand
        // Brand::class permet d'aller chercher le FQCN (fully qualified className) de la classe Brand
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;


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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

}