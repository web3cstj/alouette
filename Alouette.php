<?php
class Alouette {
	/** Méthode titre
	 * Retourne le titre tel qu'affiché dans le head et le h1 de la page
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
	 * @return string
	 */
	static public function titre($oiseau, $qualite) {
		return $oiseau.', '.$qualite.' '.$oiseau;
	}
	/** Méthode chanson
	 * Retourne la chanson au complet dans un div.chanson
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
	 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
	 * @param array $membres - Les membres à traiter
	 * @uses strophe
	 * @return string
	 */
	static public function chanson($oiseau, $qualite, $action, $membres) {
		$resultat = '';
		$membresDits = array();
		$resultat .= '<div class="chanson">';
		foreach ($membres as $membre) {
			array_unshift($membresDits, $membre);
			$resultat .= Alouette::strophe($oiseau, $qualite, $action, $membre, $membresDits);
		}
		$resultat .= '</div>';
		return $resultat;
	}
	/** Méthode strophe
	 * Retourne une strophe au complet
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
	 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
	 * @param string $membre - Le membre (la tête)
	 * @param array $membresDits - Les membres à énumérer
	 * @uses refrain
	 * @uses couplet
	 * @return string
	 */
	static public function strophe($oiseau, $qualite, $action, $membre, $membresDits) {
		$resultat = '';
		$resultat .= '<div class="strophe">';
		$resultat .= self::refrain($oiseau, $qualite, $action);
		$resultat .= self::couplet($oiseau, $action, $membre, $membresDits);
		$resultat .= '</div>';
		return $resultat;
	}
	/** Méthode refrain
	 * Retourne les 2 phrases du refrain dans des div. Le tout répété 2 fois à l'aide
	 *   de appelReponse et regroupé dans un dans un div.refrain
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
	 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
	 * @uses titre
	 * @uses appelReponse
	 * @return string
	 */
	static public function refrain($oiseau, $qualite, $action) {
		$resultat = '';
		$resultat .= '<div>'.self::titre($oiseau, $qualite).'</div>';
		$resultat .= '<div>'.$oiseau.', je '.$action.'.'.'</div>';
		$resultat = self::appelReponse($resultat);
		$resultat = '<div class="refrain">'.$resultat.'</div>';
		return $resultat;
	}
	/** Méthode couplet
	 * Génère l'appel puis la réponse d'une phrase de la chanson passée en paramètre.
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $action - L'action que l'on fera subire à l'oiseau (plumerai)
	 * @param string $membre - Le membre (la tête)
	 * @param array $membresDits - Les membres à énumérer
	 * @uses actionMembre
	 * @uses enumMembres
	 * @uses appelReponse
	 * @return string
	 * @note L'appel est dans un div.appel et la réponse, dans un div.reponse
	 */
	static public function couplet($oiseau, $action, $membre, $membresDits) {
		$resultat = '';
		$resultat .= self::actionMembre($action, $membre);
		$resultat .= self::enumMembres($membresDits);
		$resultat .= self::appelReponse($oiseau);
		$resultat .= '<div>Aaaah . . . </div>';
		return $resultat;
	}
	/** Méthode appelReponse
	 * Génère l'appel puis la réponse d'une phrase de la chanson passée en paramètre.
	 * @param string $phrase - La phrase à répéter
	 * @return string
	 * @note L'appel est dans un div.appel et la réponse, dans un div.reponse
	 */
	static public function appelReponse($phrase) {
		$resultat = '';
		$resultat .= '<div class="appel">'.$phrase.'</div>';
		$resultat .= '<div class="reponse">'.$phrase.'</div>';
		return $resultat;
	}
	/** Méthode enumMembres
	 * Génère l'énumération des membres passée en paramètre.
	 * @param array $membres - Les membres à énumérer
	 * @uses appelReponse
	 * @return string
	 */
	static public function enumMembres($membres) {
		$resultat = '';
		foreach ($membres as $membre) {
			$resultat .= self::appelReponse('Et '.$membre);
		}
		return $resultat;
	}
	/** Méthode actionMembre
	 * Génère la menace faite à l'oiseau sur son membre.
	 * @param string $action - L'action
	 * @param string $membre - Le membre
	 * @uses appelReponse
	 * @return string
	 */
	static public function actionMembre($action, $membre) {
		$resultat = self::appelReponse('Je '.$action.' '.$membre);
		return $resultat;
	}
	static public function form($donnees) {
		$resultat = '';
		$resultat .= '<form action="perso.php" action="get">';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="oiseau">Oiseau</label>';
		$resultat .= '<input type="text" name="oiseau" id="oiseau" value="'.$donnees['oiseau'].'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="qualite">Qualité</label>';
		$resultat .= '<input type="text" name="qualite" id="qualite" value="'.$donnees['qualite'].'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="action">Action</label>';
		$resultat .= '<input type="text" name="action" id="action" value="'.$donnees['action'].'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="membres">Membres</label>';
		// $membres = '';
		// foreach($donnees['membres'] as $id => $membre) {
		// 	$membres .= $membre."\r\n";
		// }
		$membres = implode("\r\n", $donnees['membres']);
		$resultat .= '<textarea name="membres" id="membres" cols="20" rows="10">'.$membres.'</textarea>';
		$resultat .= '</div>';
		$resultat .= '<div class="submit"><input type="submit" value="Composer"/></div>';
		$resultat .= '</form>';
		return $resultat;
	}

}
