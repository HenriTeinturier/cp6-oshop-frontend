# Structure 

## Dossier `public`

Ce dossier contient tous les fichiers téléchargés par le navigateur, les fichiers dits 'publics'.
C'est à dire : 
- `index.php` (le fichier demandé par toutes les requetes)
- Fichiers CSS
- Fichiers JS
- Images
  -  Soit les `assets`
-  `.htaccess` pour rediriger les requetes vers index.php

## Dossier `app`

Contient les fichiers qui ne sont pas accessibles par le client (navigateur).

- Les Classes (Controllers)
- Les templates
  - Tous les fichiers inclus pas PHP
- `.htaccess` qui bloque la navigation sur ce dossier


## Fichier `index.php`

Ce fichier sert de point d'entrée à toutes les requetes sur le site. Il forme avec son .htaccess le **frontController**.

- Il analyse le nom de la page demandée (paramètre GET 'page')
- Il définit la liste des `routes`.
- Il vérifie que la page demandée fait partie des routes.
- Il exécute le code lié à la page demandée (dispatch)