<?php 

// Un model est une classe qui sert à représenter une table de la BDD. Ce model Product représente la table "product".
class Brand extends CoreModel {

    // Pour chaque colonne de la table "product", on se crée une propriété privée dans le model Product.
    // On bloque l'accès à ces propriétés depuis l'extérieur de la classe grace au mot-clé private.
    
    private $name;
    private $footer_order;
    

   


    /**
     * Méthode qui permet de récupérer un produit donné dans la BDD
     *
     * @param int $id
     * @return Product
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

        // On veut récupérer le résultat sous la forme d'un objet de type Product. Donc on utilise fetchObject (à la place de fetch) qui va automatiquement instancier la classe Product et remplir les propriétés avec les infos de la BDD.
        $brand = $pdoStatement->fetchObject('Brand');

        return $brand;
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
        $sql = "SELECT * FROM `brand`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les produits
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $brand = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');

        return $brand;
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