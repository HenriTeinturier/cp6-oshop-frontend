# Composer

Permet de gérer les dépendances, c'est à dire les différents morceaux de code créés par d'autres personnes dont on a besoin.

## Installation 

https://getcomposer.org/download/

## Mise à jour / installation des dépendances existantes

`composer update`

## Installation d'une dépendance

`composer require nomdeladependance`

Installation c'est mettre à jour le fichier `composer.json` qui liste toutes les dépendances du projet. **Composer** va lire ce fichier et aller télécharger tout ce qui est indiqué et le ranger dans le dossier `vendor`.

## Magasin des dépendances

https://packagist.org/

Exemple d'installation de var_dumper : 

`composer require symfony/var-dumper`


## On ignore le code externe

Le code provenant des dépendances ne nous appartient pas, on ne doit jamais le modifier (nos modification seraient écrasées par les mises à jour). Donc on indique à Git de ne pas surveiller/commiter le dossier `vendor` à l'aide du fichier `.gitignore`.

## Utilisation des dépendances

Pour rendre les classes installées par composer disponibles dans notre code, on commence par inclure le fichier `autoload.php`

`require __DIR__.'/../vendor/autoload.php';`

Ce fichier va inclure automatiquement les classes qu'on demande.

