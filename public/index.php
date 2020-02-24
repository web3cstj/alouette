<?php
error_reporting(E_ALL);
include "../donnees.inc.php";
include "../Alouette.php";
$pdo = new PDO("sqlite:".__DIR__."/../database/ritournelle.sqlite");
$stmt = $pdo->prepare("SELECT id, oiseau, qualite, action, membres FROM view_chansons ORDER BY oiseau");
$affichage = '';
$stmt->execute();
// var_dump($pdo->errorInfo());
// var_dump($chanson);
$affichage .= '<ul class="cadre">';
while (($chanson = $stmt->fetchObject()) !== false) {
	$affichage .= '<li>';
	$affichage .= '<a href="corbeau.php?id='.$chanson->id.'">';
	$affichage .= ucfirst($chanson->qualite).' '.$chanson->oiseau.', je '.$chanson->action;
	$affichage .= '</a>';
	$affichage .= '</li>';
}
$affichage .= '</ul>';
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title>Les chansons</title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
				<h1>Les chansons</h1>
				
				<?php echo $affichage; ?>
            </div>
        </div>
	</body>
</html>
