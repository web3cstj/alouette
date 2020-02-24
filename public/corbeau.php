<?php
include "../Alouette.php";
$db = new PDO("sqlite:../database/ritournelle.sqlite");
$stmt = $db->prepare("SELECT oiseau, qualite, action, membres FROM view_chansons WHERE id = ?");
$stmt->execute([3]);
$donnees = $stmt->fetchObject();
$chanson = new Alouette($donnees->oiseau, $donnees->qualite, $donnees->action, $donnees->membres);
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title><?php echo $chanson->titre(); ?></title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
                <h1><?php echo $chanson->titre(); ?></h1>
                <?php echo $chanson->chanson(); ?>
            </div>
        </div>
	</body>
</html>
