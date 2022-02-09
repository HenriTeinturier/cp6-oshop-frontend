<?php


// La classe Animal est la classe la plus "générique" de notre projet. Elle possède des propriétés et des méthodes qui seront communes à toutes les classes qui étendront Animal.
class Animal
{
    public $vivant = true;
    
    public function manger()
    {
        echo "Je mange";
    }

    public function respirer()
    {
        echo "Je respire";
    }
}
