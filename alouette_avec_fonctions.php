<?php
require_once('alouette.inc.php');
// Consignes : reproduire le fonctionnement de la page modèle en utilisant
//   les variables contenues dans le fichier 'alouette.inc.php'.
$titre = titre($oiseau, $qualite);
$affichage = '';
$affichage .= '<h1>'.$titre.'</h1>';
$membresDits = array();
$affichage .= '<div class="chanson">';
foreach ($membres as $membre) {
	array_unshift($membresDits, $membre);
	$affichage .= strophe($oiseau, $qualite, $action, $membre, $membresDits);
}
$affichage .= '</div>';
/** Fonction titre
 * Retourne le titre tel qu'affiché dans le head et le h1 de la page
 * @param string $oiseau - Le nom de l'oiseau (Alouette)
 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
 * @return string
 */
function titre($oiseau, $qualite) {
	return $oiseau.', '.$qualite.' '.$oiseau;
}
/** Fonction chanson
 * Retourne la chanson au complet dans un div.chanson
 * @param string $oiseau - Le nom de l'oiseau (Alouette)
 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
 * @param array $membres - Les membres à traiter
 * @uses strophe
 * @return string
 */
function chanson($oiseau, $qualite, $action, $membres) {
	$resultat = '';
	$membresDits = array();
	$resultat .= '<div class="chanson">';
	foreach ($membres as $membre) {
		array_unshift($membresDits, $membre);
		$resultat .= strophe($oiseau, $qualite, $action, $membre, $membresDits);
	}
	$resultat .= '</div>';
	return $resultat;
}
/** Fonction strophe
 * Retourne les 2 phrases du refrain dans des div. Le tout répété 2 fois à l'aide
 *   de appelReponse et regroupé dans un dans un div.refrain
 * @param string $oiseau - Le nom de l'oiseau (Alouette)
 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
 * @uses appelReponse
 * @return string
 */
function strophe($oiseau, $qualite, $action, $membre, $membresDits) {
	$resultat = '';
	$resultat .= '<div class="strophe">';
	$resultat .= refrain($oiseau, $qualite, $action);
	$resultat .= couplet($oiseau, $action, $membre, $membresDits);
	$resultat .= '</div>';
	return $resultat;
}
/** Fonction refrain
 * Retourne les 2 phrases du refrain dans des div. Le tout répété 2 fois à l'aide
 *   de appelReponse et regroupé dans un dans un div.refrain
 * @param string $oiseau - Le nom de l'oiseau (Alouette)
 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
 * @uses appelReponse
 * @return string
 */
function refrain($oiseau, $qualite, $action) {
	$resultat = '';
	$resultat .= '<div>'.titre($oiseau, $qualite).'</div>';
	$resultat .= '<div>'.$oiseau.', je '.$action.'.'.'</div>';
	$resultat = appelReponse($resultat);
	$resultat = '<div class="refrain">'.$resultat.'</div>';
	return $resultat;
}
/** Fonction couplet
 * Génère l'appel puis la réponse d'une phrase de la chanson passée en paramètre.
 * @param string $oiseau - Le nom de l'oiseau (Alouette)
 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
 * @param string $membre - Le membre (la tête)
 * @param array $membresDits - Les membres à énumérer
 * @return string
 * @note L'appel est dans un div.appel et la réponse, dans un div.reponse
 */
function couplet($oiseau, $action, $membre, $membresDits) {
	$resultat = '';
	$resultat .= actionMembre($action, $membre);
	$resultat .= enumMembres($membresDits);
	$resultat .= appelReponse($oiseau);
	$resultat .= '<div>Aaaah . . . </div>';
	return $resultat;
}
/** Fonction appelReponse
 * Génère l'appel puis la réponse d'une phrase de la chanson passée en paramètre.
 * @param string $phrase - La phrase à répéter
 * @return string
 * @note L'appel est dans un div.appel et la réponse, dans un div.reponse
 */
function appelReponse($phrase) {
	$resultat = '';
	$resultat .= '<div class="appel">'.$phrase.'</div>';
	$resultat .= '<div class="reponse">'.$phrase.'</div>';
	return $resultat;
}
/** Fonction enumMembres
 * Génère l'énumération des membres passée en paramètre.
 * @param array $membres - Les membres à énumérer
 * @return string
 */
function enumMembres($membres) {
	$resultat = '';
	foreach ($membres as $membre) {
		$resultat .= appelReponse('Et '.$membre);
	}
	return $resultat;
}
/** Fonction actionMembre
 * Génère la menace faite à l'oiseau sur son membre.
 * @param string $action - L'action
 * @param string $membre - Le membre
 * @return string
 */
function actionMembre($action, $membre) {
	$resultat = appelReponse('Je '.$action.' '.$membre);
	return $resultat;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="alouette.css" />
<title><?php echo $titre ?></title>
</head>
<body>
<?php echo $affichage ?>
<?php include_once "../source.php"; ?></body>
</html>
