<?php
function menu() {
	$elements = [
		'Alouette' => 'index.php',
		'Corbeau' => 'corbeau.php',
		'Pie' => 'pie.php',
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
	return $affichage;
}
echo menu();
