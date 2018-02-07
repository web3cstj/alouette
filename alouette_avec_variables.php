<?php
require_once('alouette.inc.php');
// Consignes : reproduire le fonctionnement de la page modèle en utilisant
//   les variables contenues dans le fichier 'alouette.inc.php'.
// Indice : On a besoin de 2 boucles imbriquées.
$titre = $oiseau.', '.$qualite.' '.$oiseau;
$refrain1 = '<div>'.$titre.'</div>';
$refrain2 = '<div>'.$oiseau.', je '.$action.'.'.'</div>';
$affichage = '';
$affichage .= '<h1>'.$titre.'</h1>';
$membres_dits = array();
$affichage .= '<div class="chanson">';
foreach ($membres as $membre) {
	$affichage .= '<div class="strophe">';
	$affichage .= '<div class="refrain">';
	$affichage .= '<div class="appel">'.$refrain1.$refrain2.'</div>';
	$affichage .= '<div class="reponse">'.$refrain1.$refrain2.'</div>';
	$affichage .= '</div>';
	$action_membre = 'Je '.$action.' '.$membre.'';
	$affichage .= '<div class="appel">'.$action_membre.'</div>';
	$affichage .= '<div class="reponse">'.$action_membre.'</div>';
	array_unshift($membres_dits, $membre);
	foreach ($membres_dits as $membre_dit) {
		$et_membre = 'Et '.$membre_dit.'';
		$affichage .= '<div class="appel">'.$et_membre.'</div>';
		$affichage .= '<div class="reponse">'.$et_membre.'</div>';
	}
	$affichage .= '<div class="appel">'.$oiseau.'</div>';
	$affichage .= '<div class="reponse"> '.$oiseau.'</div>';
	$affichage .= '<div>Aaaah . . . </div>';
	$affichage .= '</div>';
}
$affichage .= '</div>';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="alouette.css" />
<title><?php echo $titre ?></title>
</head>
<body>
<?php include "menu.inc.php"; ?>
<?php echo $affichage ?>
<?php include_once "../source.php"; ?></body>
</html>
