<?php

// Le CoreModel est un model qui sert à stocker les propriétés et méthodes communes à tous les models.
class CoreModel {

    // On déclare les propriétés que possèdent tous les models
    protected $id;
    protected $created_at;
    protected $updated_at;


    // On déclare les méthodes que possèdent tous les models
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

     /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


}