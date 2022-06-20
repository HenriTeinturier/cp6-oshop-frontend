<?php
namespace App\Models;

class CoreModel {

    // On déclare les propriétés que possèdent tous les models
    protected $id;
    protected $created_at;
    protected $updated_at;

    // on déclare les méthodes que possèdent tous les models
    // pas de setId car normalement il ne faut pas le modifier
    public function getId(){
        return $this->id;
    }

     /**
     * Get the value of created_at
     */ 
    public function getCreated_at(){
        return $this->created_at;
    }
    public function setCreated_at($created_at){
        $this->created_at = $created_at;

        return $this;
    }
    public function getUpdated_at(){
        return $this->updated_at;
    }
    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;

        return $this;
    }
}






