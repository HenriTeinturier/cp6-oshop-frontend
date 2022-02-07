<?php

// La classe Mammifere étend la class Animal. C'est à dire qu'elle possède toutes les caractéritiques de la classe Animal en plus des siennes.
class Mammifere extends Animal
{
    public $poils = true;


    public function allaiter()
    {
        echo "J'allaite";
    }
}
