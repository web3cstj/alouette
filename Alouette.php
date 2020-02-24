<?php
class Alouette {
	private $oiseau = "";
	private $qualite = "";
	private $action = "";
	private $membres = [];
	public function __construct($oiseau, $qualite, $action, $membres) {
		$this->oiseau = $oiseau;
		$this->qualite = $qualite;
		$this->action = $action;
		if (is_string($membres)) {
			$membres = explode("\r\n", $membres);
		}
		$this->membres = $membres;
	} 
	/** Méthode titre
	 * Retourne le titre tel qu'affiché dans le head et le h1 de la page
	 * @param string $oiseau - Le nom de l'oiseau (Alouette)
	 * @param string $qualite - La qualité que l'on donne à l'oiseau (gentille)
	 * @return string
	 */
	public function titre() {
		return $this->oiseau.', '.$this->qualite.' '.$this->oiseau;
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
	public function chanson() {
		$resultat = '';
		$membresDits = [];
		$resultat .= '<div class="chanson">';
		foreach ($this->membres as $membre) {
			array_unshift($membresDits, $membre);
			$resultat .= $this->strophe($membre, $membresDits);
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
	public function strophe($membre, $membresDits) {
		$resultat = '';
		$resultat .= '<div class="strophe">';
		$resultat .= $this->refrain();
		$resultat .= $this->couplet($membre, $membresDits);
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
	public function refrain() {
		$resultat = '';
		$resultat .= '<div>'.$this->titre().'</div>';
		$resultat .= '<div>'.$this->oiseau.', je '.$this->action.'.'.'</div>';
		$resultat = $this->appelReponse($resultat);
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
	public function couplet($membre, $membresDits) {
		$resultat = '';
		$resultat .= $this->actionMembre($membre);
		$resultat .= $this->enumMembres($membresDits);
		$resultat .= $this->appelReponse($this->oiseau);
		$resultat .= '<div>Aaaah . . . </div>';
		return $resultat;
	}
	/** Méthode appelReponse
	 * Génère l'appel puis la réponse d'une phrase de la chanson passée en paramètre.
	 * @param string $phrase - La phrase à répéter
	 * @return string
	 * @note L'appel est dans un div.appel et la réponse, dans un div.reponse
	 */
	public function appelReponse($phrase) {
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
	public function enumMembres($membres) {
		$resultat = '';
		foreach ($membres as $membre) {
			$resultat .= $this->appelReponse('Et '.$membre);
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
	public function actionMembre($membre) {
		$resultat = $this->appelReponse('Je '.$this->action.' '.$membre);
		return $resultat;
	}
	public function form($donnees, $method="get", $action="") {
		$resultat = '';
		$resultat .= '<form action="'.$action.'" method="'.$method.'">';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="oiseau">Oiseau</label>';
		$resultat .= '<input type="text" name="oiseau" id="oiseau" value="'.$this->oiseau.'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="qualite">Qualité</label>';
		$resultat .= '<input type="text" name="qualite" id="qualite" value="'.$this->qualite.'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="action">Action</label>';
		$resultat .= '<input type="text" name="action" id="action" value="'.$this->action.'"/>';
		$resultat .= '</div>';
		$resultat .= '<div class="champ">';
		$resultat .= '<label for="membres">Membres</label>';
		// $membres = '';
		// foreach($this->membres as $id => $membre) {
		// 	$membres .= $membre."\r\n";
		// }
		$membres = implode("\r\n", $this->membres);
		$resultat .= '<textarea name="membres" id="membres" cols="20" rows="10">'.$membres.'</textarea>';
		$resultat .= '</div>';
		$resultat .= '<div class="submit">';
		$resultat .= '<input type="hidden" name="composer"/>';
		$resultat .= '<input type="submit" value="Composer"/>';
		$resultat .= '</form>';
		return $resultat;
	}
}
