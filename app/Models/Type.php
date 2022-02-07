<?php 

class Type extends CoreModel {

    // Propriétés du model Type
    private $name;
    private $footer_order;

    
    /**
     * Méthode permettant de récupérer un objet de type Type d'après son ID
     *
     * @param int $id ID du type à trouver
     * @return Type
     */
    public function find($id)
    {
        // On se connecte à la BDD à l'aide de notre nouvel outil Database. Celui-ci nous renvoie une instance de PDO connectée à la BDD.
        $pdo = Database::getPDO();
            
        // Je fais ma requete SQL
        $sql = "SELECT * FROM `type`
        WHERE `id` = " . $id;

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On veut récupérer le résultat sous la forme d'un objet de type Type. Donc on utilise fetchObject (à la place de fetch) qui va automatiquement instancier la classe Type et remplir les propriétés avec les infos de la BDD.
        $type = $pdoStatement->fetchObject('Type');

        return $type;
    }

    /**
     * Méthode qui récupère tous les types de la BDD
     *
     * @return Array
     */
    public function findAll()
    {
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        // Je fais ma requete SQL
        $sql = "SELECT * FROM `type`";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // Je recupère un tableau avec tous les types
        // Contrairement à la saison passée, on veut récupérer un tableau avec des objets dedans. Donc on utilise toujours la méthode fetchAll mais cette fois on précise qu'on veut des objets grace au mot-clé PDO::FETCH_CLASS et le nom de la classe concernée.
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');

        return $types;
    }


    public function findAllForFooter()
    {
        
        // Je me connecte à la BDD
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `type`
        WHERE `footer_order` > 0
        ORDER BY `footer_order` ASC
        LIMIT 5";

        // Je la transmets à la BDD via PDO
        $pdoStatement = $pdo->query($sql);

        // On traduit le résultat en un tableau contenant des objets de type Brand
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type');

        return $types;


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