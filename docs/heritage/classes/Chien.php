<?php

// La classe Chien étend la classe Mammifere, elle possède donc tous les caractéristiques de la classe Mammifere ET toutes celles de la classe Animal, en plus des siennes
class Chien extends Mammifere
{
    public $bave = true;


    public function aboyer()
    {
        echo "Wouaf ! ";
    }
}
