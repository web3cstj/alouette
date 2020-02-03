# Exercice Alouette

Le but de cette page est de produire une chanson folklorique (Alouette) à partir
de données se trouvant dans les variables d'un fichier d'inclusion.

public/index.html : La version figée de la page.


alouette-echos.php : La version pas très efficace où l'on fait une multitude de
    echo dans la page et les boucles sont directement dans le HTML

alouette-variables : Une version plus normalisée où les éléments répétitifs sont
    mis dans des variables et l'affichage se fait une seule fois dans la page

alouette-fonction : Une version pas encore optimale où l'on utilise des fonction.
    notamment la fonction appel_reponse, qui est beaucoup utilisée.

alouette-fonction : Une version presque optimale où l'on utilise une classe et
    des méthodes statiques. Ce niveau de normalisation est exagéré pour un si petit
    projet, mais on apprend à faire de gros sites...
*/
include "alouette_statique.php";
//include "alouette_avec_echos.php";
//include "alouette_avec_variables.php";
//include "alouette_avec_fonctions.php";
//include "alouette_avec_classe.php";
?>
