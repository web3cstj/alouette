<?php
$elements = [
	'Alouette' => 'index.php',
	'Ma chanson 1' => '#',
	'Ma chanson 2' => '#',
	'Ma chanson<br/>à moi' => 'perso.php',
	'Composer<br/>ma chanson' => 'formulaire.php',
];
$affichage = '';
$affichage .= '<nav>';
$affichage .= '<ul>';
foreach ($elements as $etiquette => $url) {
	if ($url === basename($_SERVER['PHP_SELF'])) {
		$affichage .= '<li class="courant">';
	} else {
		$affichage .= '<li>';
	}
	$affichage .= '<a href="'.$url.'">'.$etiquette.'</a>';
	$affichage .= '</li>';
}
$affichage .= '</ul>';
$affichage .= '</nav>';
echo $affichage;