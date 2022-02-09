<?php

// La classe Chat étend la classe Mammifere, elle possède donc tous les caractéristiques de la classe Mammifere ET toutes celles de la classe Animal, en plus des siennes.
// Mais elle ne possède pas les caractéristiques de la classe Chien, car ce sont des classes soeurs.

class Chat extends Mammifere
{
    public $fourbe = true;

    public function dormir()
    {
        echo "Je dors toute la journée";
    }
}
