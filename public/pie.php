<?php
include "../Alouette.php";
$db = new PDO("sqlite:../database/ritournelle.sqlite");
$stmt = $db->prepare("SELECT oiseau, qualite, action, membres FROM view_chansons WHERE id = ?");
$stmt->execute([2]);
$chanson = $stmt->fetchObject();
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/alouette.css" />
		<title><?php echo Alouette::titre($chanson->oiseau, $chanson->qualite); ?></title>
	</head>
	<body>
        <div id="app">
            <?php include "../header.inc.php"; ?>
            <?php include "../footer.inc.php"; ?>
            <?php include "../menu.inc.php"; ?>
    		<div class="body">
                <h1><?php echo Alouette::titre($chanson->oiseau, $chanson->qualite); ?></h1>
                <?php echo Alouette::chanson($chanson->oiseau, $chanson->qualite, $chanson->action, explode("\r\n",$chanson->membres)); ?>
            </div>
        </div>
	</body>
</html>
