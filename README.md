# Exercice Alouette

Le but de cette page est de produire une chanson folklorique (Alouette) à partir
de données se trouvant dans les variables d'un fichier d'inclusion.

## Fichiers et directives
public/index.html : La version figée de la page. 
1. Changer l'extension pour `php`
1. Au début du document, faire l'inclusion des fichiers `donnees.inc.php` et `Alouette.php` (Donner le bon chemin)
1. Dans le `body`, remplacer le `header`, le `footer` et le `nav` par l'inclusion de leurs fichiers respectifs.

## Alouette.php
1. Créer toutes les méthodes avec les bons paramètres tels que décrit dans le commentaire.
2. Dans chaque méthode, ajouter le `html` provenant du document initial `index.html` en créant des concaténations. 
    - Commencer par les méthodes qui n'ont pas la mention `@uses`. 
    - Ne pas se soucier des paramètres pour l'instant.
    - Ne garder qu'une seule itération lorsqu'il y a répétition (donc boucle).
    - Tester chaque méthode à la fin du fichier en ajoutent une commande d'affichage et visionner directement le fichier `Alouette.php`. Par exemple: 
        ```php 
        echo Alouette::titre('Pigeon', 'constipé'); // afficherait "Alouette, gentille alouette"
        ```
    - Ajouter les variables (paramètres) simples par concaténation.
    - Tester: 
        ```php 
        echo Alouette::titre('Pigeon', 'constipé'); // afficherait "Pigeon, constipé pigeon"
        ```
    - Ajouter les appels aux méthodes (`@uses`)
    - Ajouter les boucles et la mécanique générale.

## donnees.inc.php
1. S'amuser à changer les valeurs.